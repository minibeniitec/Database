/*  Source: 	Database.cpp
 *	Author:		Benjamin A Garza III
 *	Date:		April 6, 2019
 *	Class:		CMPS 3420 - Databases
 *	Purpose: 	Easy dba access via terminal.
 *
 *  Compile:
 *      g++ Database.cpp -o Database
 */
#include <iostream>
using namespace std;

void printMenu() {
    cout << "\n\nMenu:\n";
    cout << "1. Create user and tablespaces\n";
    cout << "2. Create all tables\n";
    cout << "3. Insert default tuples\n";
    cout << "4. Drop all tables\n";
    cout << "5. Drope user and tablesapces\n";
    cout << "6. Query All into file\n";
    cout << "0. Quit\n";
    cout << "Choice: ";
    return;
}

int getChoice() {
    int choice;
    while (!(cin >> choice)) {
        // Explain error
        cout << "ERROR: a number must be entered: ";
        // Clear input stream
        cin.clear();
        // Discard previous input
        cin.ignore(132, '\n');
    }
    return choice;
}

int main() {
    int choice = 0;
    do {
        switch (choice) {
            case 0:
                cout << "Welcome to Dionysus Brewing Company Database!\n";
                cout << "Note: Enter -1 for help\n\n";
                break;
            case 1: 
                cout << "Creating User and Tablespaces:\n";
                system("psql -f Create_User_Tablespaces.sql");
                break;
            case 2:
                cout << "Creating Tables:\n";
                system("psql -f Create_Tables.sql dionysusbrewingco dionysus");
                break;
            case 3:
                cout << "Inserting defualt tuples into all tables:\n";
                system("psql -f Insert_Tuples.sql dionysusbrewingco dionysus");
                break;
            case 4:
                cout << "Dropping all tables:\n";
                system("psql -f Drop_Tables.sql dionysusbrewingco dionysus");
                break;
            case 5:
                cout << "Droping User and Tablespaces\n";
                system("psql -f Drop_User_Tablespaces.sql");
                break;
            case 6:
                cout << "Querying:\n";
                system("psql -f Query_All.sql dionysusbrewingco dionysus");
                break;
            default:
                cout << "Error: Please enter a valid option.";
        }
        printMenu();
        choice = getChoice();
    } while (choice != 0);

    return 0;
}