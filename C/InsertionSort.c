#include <stdio.h>

// Swap two integers
void swap(int* a, int* b)
{
    int temp = *a;
    *a = *b;
    *b = temp;
}

// Insertion Sort function
void insertion_sort(int arr[], int n)
{
    for (int i = 1; i < n; i++) 
    {
        int key = arr[i];
        int j = i - 1;

        // Shift elements greater than key
        while (j >= 0 && arr[j] > key) 
        {
            arr[j + 1] = arr[j];
            j--;
        }
        arr[j + 1] = key;
    }
}

// Function to take input for the array
int input_array(int arr[], int max_size)
{
    int n;
    printf("Enter the number of elements (up to %d): ", max_size);
    scanf("%d", &n);
    
    // Check if number of elements is valid
    if (n > max_size || n < 1)
    {
        printf("Invalid number of elements!\n");
        return -1;
    }

    printf("Enter the elements:\n");
    for (int i = 0; i < n; i++)
    {
        printf("Element %d: ", i + 1);
        scanf("%d", &arr[i]);
    }

    return n;
}

// Function to display the array
void display_array(int arr[], int n)
{
    printf("Sorted Array: ");
    for (int i = 0; i < n; i++)
        printf("%d ", arr[i]);
    printf("\n");
}

int main()
{
    int A[20];  // Max size of array
    int num_elements;

    // Take input and validate the number of elements
    num_elements = input_array(A, 20);
    if (num_elements == -1)
        return 1;  // Terminate if input is invalid

    // Sort the array using insertion sort
    insertion_sort(A, num_elements);

    // Display the sorted array
    display_array(A, num_elements);

    return 0;
}

