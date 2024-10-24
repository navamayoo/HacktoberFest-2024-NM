#include <stdio.h>

// Function to swap two integers
void swap(int* a, int* b)
{
    int temp = *a;
    *a = *b;
    *b = temp;
}

// Selection Sort function
void selection_sort(int arr[], int n)
{
    for (int i = 0; i < n - 1; i++) 
    {
        int min_index = i;  // Assume the current element is the smallest

        // Find the minimum element in the unsorted part of the array
        for (int j = i + 1; j < n; j++) 
        {
            if (arr[j] < arr[min_index]) 
            {
                min_index = j;  // Update min_index if a smaller element is found
            }
        }

        // Swap the found minimum element with the first element
        if (min_index != i) 
        {
            swap(&arr[i], &arr[min_index]);
        }
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

    // Input array elements
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
    {
        printf("%d ", arr[i]);
    }
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

    // Sort the array using Selection Sort
    selection_sort(A, num_elements);

    // Display the sorted array
    display_array(A, num_elements);

    return 0;
}

