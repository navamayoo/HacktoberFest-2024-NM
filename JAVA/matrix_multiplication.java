//Multiplying two matrices in Java 


import java.util.*;

public class matrix_multiplication {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in); // Create a Scanner object for input

        // Read dimensions of the first matrix
        System.out.println("Enter dimensions of the first matrix (rows and columns):");
        int numRowsA = scanner.nextInt(); 
        int numColsA = scanner.nextInt(); 

        // Initialize the first matrix
        int[][] firstMatrix = new int[numRowsA][numColsA];
        System.out.println("Enter elements of the first matrix:");
        for (int i = 0; i < numRowsA; i++) { 
            for (int j = 0; j < numColsA; j++) { 
                firstMatrix[i][j] = scanner.nextInt(); 
            }
        }

        // Read dimensions of the second matrix
    
        System.out.println("Enter dimensions of the second matrix (rows and columns):");
        int  numRowsB = scanner.nextInt(); 
        int  numColsB = scanner.nextInt(); 

        // Check if the number of columns in the first matrix matches the number of rows in the second matrix
        if (numColsA != numRowsB) {
            System.out.println("Error: The number of columns in the first matrix must equal the number of rows in the second matrix.");
            return; // Exit the program if dimensions are invalid
        }

        // Initialize the second matrix
        int[][] secondMatrix = new int[numRowsB][numColsB];
        System.out.println("Enter elements of the second matrix:");
        for (int i = 0; i < numRowsB; i++) { 
            for (int j = 0; j < numColsB; j++) { 
                secondMatrix[i][j] = scanner.nextInt(); 
            }
        }

        // Initialize the result matrix
        int[][] resultMatrix = new int[numRowsA][numColsB]; 

        for (int i = 0; i < numRowsA; i++) { 
            for (int j = 0; j < numColsB; j++) { 
                int sum = 0; 
                for (int k = 0; k < numColsA; k++) {
                    sum += firstMatrix[i][k] * secondMatrix[k][j];
                }
                resultMatrix[i][j] = sum; // Store the computed sum in the result matrix
            }
        }

        // Print the resulting matrix
        System.out.println("Result of matrix multiplication:");
        for (int i = 0; i < resultMatrix.length; i++) { 
            for (int j = 0; j < resultMatrix[i].length; j++) { 
                System.out.print(resultMatrix[i][j] + " "); 
            }
            System.out.println(); // New line after each row
        }

        // Close the scanner
        scanner.close(); 
    }
}
