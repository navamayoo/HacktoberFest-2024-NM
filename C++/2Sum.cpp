class Solution {
public:
    vector<int> twoSum(vector<int>& nums, int target) {
       
        int n = nums.size();
       
        vector<pair<int,int>>new_vector;
        for(int i=0; i<n; i++){
            new_vector.push_back({nums[i],i}); 

        }
         sort(new_vector.begin(), new_vector.end());
          int i = 0, j = n-1;
        while(i < j){
            int sum = new_vector[i].first + new_vector[j].first;
            if (sum == target){

            return {new_vector[i].second,new_vector[j].second};
            }
            else if(sum< target){
                i++;
            }
            else j--;
        }
        return {};
    }
};
