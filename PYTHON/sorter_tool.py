def count_long_words(filename, length):
    with open(filename, 'r') as file:
        text = file.read()  # Read the entire file content

    # Split the text into words
    words = text.split()

    # Count words longer than the specified length
    long_word_count = sum(1 for word in words if len(word) > length)

    return long_word_count

def words_containing_letter(filename, letter):
    with open(filename, 'r') as file:
        text = file.read()  # Read the entire file content

    # Split the text into words
    words = text.split()

    # Count words containing the specified letter
    count = sum(1 for word in words if letter in word)

    return count

def get_item_num(filename, num):
    with open(filename, 'r') as file:
        text = file.read()  # Read the entire file content

    # Split the text into words
    words = text.split()

    # Check if the number is within the range of words
    if 0 <= num < len(words):
        return words[num]
    else:
        return "Index out of range"


if __name__ == "__main__":
    filename = 'wordlist.txt'  # Replace with your .txt file path
    num = 11  # Length for counting long words
    count_long = count_long_words(filename, num)
    
    letter = 'e'  # Replace with the letter you want to search for
    count_letter = words_containing_letter(filename, letter)
    
    num2 = 5  # Replace with the desired index (0-based)
    word = get_item_num(filename, num2)
    
    print(f"Number of words containing the letter '{letter}': {count_letter}")
    print(f"Number of words longer than {num} letters: {count_long}")
    print(f"The word at index {num2} is: '{word}'")
