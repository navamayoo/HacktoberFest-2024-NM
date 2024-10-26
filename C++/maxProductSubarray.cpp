#include <iostream>
#include <vector>
#include <algorithm>

using namespace std;

int maxProductSubarray(const vector<int>& nums) {
    if (nums.empty()) return 0;

    int maxProduct = nums[0];
    int minProduct = nums[0];
    int result = maxProduct;

    for (size_t i = 1; i < nums.size(); ++i) {
        if (nums[i] < 0) {
            swap(maxProduct, minProduct);
        }

        maxProduct = max(nums[i], maxProduct * nums[i]);
        minProduct = min(nums[i], minProduct * nums[i]);

        result = max(result, maxProduct);
    }

    return result;
}

int main() {
    vector<int> nums = {2, 3, -2, 4};
    int maxProduct = maxProductSubarray(nums);
    cout << "Maximum product of a contiguous subarray: " << maxProduct << endl;

    return 0;
}
