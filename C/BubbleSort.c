#include <stdio.h>

// Function to swap two integers
void swap(int* x, int* y) 
{
    int temp = *x;
    *x = *y;
    *y = temp;
}

// Bubble sort function
void bubble_sort(int arr[], int n) 
{
    int i, j, flag;

    for (i = 0; i < n - 1; i++) 
    {
        flag = 0;  // Reset flag for each pass

        for (j = 0; j < n - i - 1; j++) 
        {
            if (arr[j] > arr[j + 1]) 
            {
                // Swap if the current element is greater than the next
                swap(&arr[j], &arr[j + 1]);
                flag = 1;  // Mark that a swap has occurred
            }
        }

        // If no swaps occurred in this pass, the array is already sorted
        if (flag == 0) 
            break;
    }
}

// Function to take input for the array
int input_array(int arr[], int max_size) 
{
    int n;

    // Prompt user for number of elements
    printf("Enter the number of elements (up to %d): ", max_size);
    scanf("%d", &n);

    // Validate number of elements
    if (n > max_size || n < 1) 
    {
        printf("Invalid number of elements!\n");
        return -1;
    }

    // Prompt user to input array elements
    printf("Enter the elements:\n");
    for (int i = 0; i < n; i++) 
    {
        printf("Element %d: ", i + 1);
        scanf("%d", &arr[i]);
    }

    return n;
}

// Function to display the sorted array
void display_array(int arr[], int n) 
{
    printf("Sorted Array: ");
    for (int i = 0; i < n; i++) 
        printf("%d ", arr[i]);
    printf("\n");
}

int main() 
{
    int A[20];  // Max size of the array
    int num_elements;

    // Input array elements with validation
    num_elements = input_array(A, 20);
    if (num_elements == -1) 
        return 1;  // Exit if input is invalid

    // Sort the array using Bubble Sort
    bubble_sort(A, num_elements);

    // Display the sorted array
    display_array(A, num_elements);

    return 0;
}

