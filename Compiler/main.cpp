#include <iostream>
#include <fstream>


using namespace std;


int main() {
    ifstream iFile("input.txt");

    if (!iFile.is_open()) {
        cerr << "Could not open input file\n";
        return 1;
    }

    while (iFile.good()) {
        string token = getToken(iFile);

        if (token.empty()) {
            break;
        }

        TokenType tokenType = getTokenType(token);

        if (tokenType == UNKNOWN) {
            cerr << "Unknown token: " << token << "\n";
            return 1;
        }

        if (tokenType == IDENTIFIER) {
            // Check if the identifier has already been defined in the symbol table
            if (symbolTable.find(token) != symbolTable.end()) {
                cerr << "Error: " << token << " has already been defined\n";
                return 1;
            }

            // Add the identifier to the symbol table with an initial value of 0
            symbolTable[token] = 0;
        }

        cout << "Token: " << token << ", Token type: " << getTokenTypeValueAsString(tokenType) << "\n";
    }

    return 0;
}