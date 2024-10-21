import random

class Character:
    def __init__(self, name, health, attack, defense):
        self.name = name
        self.health = health
        self.attack = attack
        self.defense = defense

    def take_damage(self, damage):
        # Calculate damage taken after applying defense
        actual_damage = max(0, damage - self.defense)
        self.health = max(0, self.health - actual_damage)
        return actual_damage

    def is_alive(self):
        return self.health > 0


class Player(Character):
    def choose_attack(self):
        # Present attack options to the player
        print("\nChoose your attack:")
        print("1. Quick Slash (Light Damage, High Accuracy)")
        print("2. Power Strike (Heavy Damage, Low Accuracy)")
        print("3. Heal (Restore some health)")

        choice = input("Enter the number of your attack: ")
        if choice == "1":
            return "Quick Slash"
        elif choice == "2":
            return "Power Strike"
        elif choice == "3":
            return "Heal"
        else:
            print("Invalid choice. Using Quick Slash by default.")
            return "Quick Slash"


class Enemy(Character):
    def choose_attack(self):
        # Enemy randomly chooses an attack
        attack_choice = random.choice(["Quick Slash", "Power Strike", "Heal"])
        return attack_choice


def calculate_damage(attack_type, attacker):
    if attack_type == "Quick Slash":
        return random.randint(5, 10)  # Light damage
    elif attack_type == "Power Strike":
        return random.randint(10, 20) * random.choice([0,1,1])  # Heavy damage
    else:
        return 0  # No damage for healing


def player_turn(player, enemy):
    attack_choice = player.choose_attack()

    if attack_choice == "Heal":
        heal_amount = random.randint(8, 15)
        player.health = min(100, player.health + heal_amount)
        print(f"{player.name} heals for {heal_amount} health!")
    else:
        damage = calculate_damage(attack_choice, player)
        actual_damage = enemy.take_damage(damage)
        print(f"{player.name} uses {attack_choice} and deals {actual_damage} damage to {enemy.name}!")


def enemy_turn(enemy, player):
    attack_choice = enemy.choose_attack()

    if attack_choice == "Heal":
        heal_amount = random.randint(8, 15)
        enemy.health = min(100, enemy.health + heal_amount)
        print(f"{enemy.name} heals for {heal_amount} health!")
    else:
        damage = calculate_damage(attack_choice, enemy)
        actual_damage = player.take_damage(damage)
        print(f"{enemy.name} uses {attack_choice} and deals {actual_damage} damage to {player.name}!")


def game():
    # Initialize player and enemy
    player = Player(name="Hero", health=100, attack=15, defense=5)
    enemy = Enemy(name="Goblin", health=100, attack=12, defense=3)

    print("\nWelcome to the 1v1 RPG Battle!")
    print(f"{player.name} vs {enemy.name}\n")
    
    # Main game loop
    while player.is_alive() and enemy.is_alive():
        print(f"\n{player.name}'s Health: {player.health}")
        print(f"{enemy.name}'s Health: {enemy.health}")

        # Player's turn
        player_turn(player, enemy)

        if not enemy.is_alive():
            print(f"\n{enemy.name} has been defeated! {player.name} wins!")
            break

        # Enemy's turn
        enemy_turn(enemy, player)

        if not player.is_alive():
            print(f"\n{player.name} has been defeated! {enemy.name} wins!")
            break

    print("\nGame Over.")


if __name__ == "__main__":
    game()
