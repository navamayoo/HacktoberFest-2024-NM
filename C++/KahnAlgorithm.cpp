#include <iostream>
#include <vector>
#include <queue>

using namespace std;

vector<int> kahnTopologicalSort(int V, vector<vector<int>>& adj) {
    vector<int> inDegree(V, 0);
    vector<int> topOrder;

    // Calculate in-degree of each vertex
    for (int i = 0; i < V; ++i) {
        for (int neighbor : adj[i]) {
            inDegree[neighbor]++;
        }
    }

    // Initialize the queue with all vertices having in-degree 0
    queue<int> q;
    for (int i = 0; i < V; ++i) {
        if (inDegree[i] == 0) {
            q.push(i);
        }
    }

    // Process nodes in the queue
    while (!q.empty()) {
        int node = q.front();
        q.pop();
        topOrder.push_back(node);

        // Decrease the in-degree of the neighbors
        for (int neighbor : adj[node]) {
            if (--inDegree[neighbor] == 0) {
                q.push(neighbor);
            }
        }
    }

    // Check for cycles
    if (topOrder.size() != V) {
        return {}; // Return empty if cycle exists
    }
    return topOrder; // Return the topological order
}
