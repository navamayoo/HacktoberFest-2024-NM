<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$cacheFilePath = './../data/method_volume_cache.json';
$walletFilePath = './../data/wallet_addresses.json';
$etherscanApiKey = 'YOUR_ETHERSCAN_API_KEY';
$targetMethodId = 'METHOD'; // The specific methodId you're targeting
$batchSize = 10;

function loadWalletAddresses($walletFilePath) {
    if (file_exists($walletFilePath)) {
        return json_decode(file_get_contents($walletFilePath), true);
    }
    return [];
}

function loadCache($cacheFilePath) {
    if (file_exists($cacheFilePath)) {
        return json_decode(file_get_contents($cacheFilePath), true);
    }
    return [];
}

function saveCache($cacheFilePath, $cache) {
    file_put_contents($cacheFilePath, json_encode($cache, JSON_PRETTY_PRINT));
}

function getEtherscanTransactions($walletAddress, $etherscanApiKey) {
    $url = "https://api.etherscan.io/api?module=account&action=txlist&address=$walletAddress&startblock=0&endblock=latest&sort=desc&apikey=$etherscanApiKey";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function calculateMethodTradedVolume($transactions, $fromAddress, $targetMethodId) {
    $totalVolume = 0;

    if ($transactions['status'] == '1' && isset($transactions['result'])) {
        foreach ($transactions['result'] as $tx) {
            if (($tx['from'] === strtolower($fromAddress) || $tx['to'] === strtolower($fromAddress)) &&
                $tx['isError'] == '0' && strpos($tx['input'], $targetMethodId) === 0) {
                $valueInEther = $tx['value'] / 1e18;
                $totalVolume += $valueInEther;
            }
        }
    }
    
    return $totalVolume;
}

$walletAddresses = loadWalletAddresses($walletFilePath);

if (empty($walletAddresses)) {
    echo json_encode(['error' => 'No wallet addresses found in the JSON file']);
    exit;
}

$cache = loadCache($cacheFilePath);

$batchIndex = isset($_GET['batch']) ? intval($_GET['batch']) : 0;

$start = $batchIndex * $batchSize;
$end = min($start + $batchSize, count($walletAddresses));

$walletBatch = array_slice($walletAddresses, $start, $batchSize);

foreach ($walletBatch as $walletAddress) {
    $transactions = getEtherscanTransactions($walletAddress, $etherscanApiKey);
    
    if ($transactions !== null && $transactions['status'] == '1') {
        $tradedVolume = calculateMethodTradedVolume($transactions, $walletAddress, $targetMethodId);
        
        if (!isset($cache[$walletAddress])) {
            $cache[$walletAddress] = [];
        }
        $cache[$walletAddress][$targetMethodId] = [
            'timestamp' => time(),
            'volume' => $tradedVolume
        ];
    }
}

saveCache($cacheFilePath, $cache);

$response = [
    'message' => 'Batch processed successfully',
    'batch_index' => $batchIndex,
    'total_batches' => ceil(count($walletAddresses) / $batchSize),
    'next_batch_url' => ($end < count($walletAddresses)) ? 'http://yourdomain.com/path/to/refresh.php?batch=' . ($batchIndex + 1) : null
];

header('Content-Type: application/json');
echo json_encode($response);
