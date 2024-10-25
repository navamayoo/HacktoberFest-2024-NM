expenses = []

# Add a new expense
def add_expense():
    date = input("Enter the date (YYYY-MM-DD): ")
    category = input("Enter the category (e.g., Food, Transport): ")
    amount = float(input("Enter the amount: "))
    expenses.append({'date': date, 'category': category, 'amount': amount})
    print("Expense added!\n")

# View all expenses
def view_expenses():
    if not expenses:
        print("No expenses found.\n")
        return
    total = 0
    print(f"{'Date':<12} {'Category':<15} {'Amount':<10}")
    print("-" * 40)
    for expense in expenses:
        print(f"{expense['date']:<12} {expense['category']:<15} {expense['amount']:<10.2f}")
        total += expense['amount']
    print(f"\nTotal expenses: {total:.2f}\n")

# Main program loop
def main():
    while True:
        print("1. Add an expense")
        print("2. View expenses")
        print("3. Quit")
        choice = input("Enter your choice: ")
        
        if choice == '1':
            add_expense()
        elif choice == '2':
            view_expenses()
        elif choice == '3':
            print("Goodbye!")
            break
        else:
            print("Invalid choice, please try again.\n")

if __name__ == "__main__":
    main()