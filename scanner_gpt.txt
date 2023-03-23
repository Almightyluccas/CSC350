#include <iostream>
#include <fstream>
#include <string>
#include <cctype>
#include <unordered_map>

using namespace std;

////////////////////////////////////////////////////////////////////////////////////////////////
// Define the symbol table to store the variables
unordered_map<string, int> symbolTable;
////////////////////////////////////////////////////////////////////////////////////////////////

enum TokenType {
    LITERAL_INT,
    LITERAL_STRING,
    LITERAL_CHAR,
    ASSIGNMENT_OPERATOR,
    COMPOUND_ASSIGNMENT_OPERATOR,
    INCREMENT_OPERATOR,
    ADDITION_OPERATOR,
    CHAR,
    IDENTIFIER,
    KEYWORD,
    SEMICOLON,
    LBRACE,
    RBRACE,
    LPAREN,
    RPAREN,
    PLUS,
    MINUS,
    STAR,
    SLASH,
    PERCENT,
    PUNCTUATOR,
    OPERATOR,
    UNKNOWN,
    END
};

string getTokenTypeValueAsString(TokenType t)
{
    switch (t)
    {
    case COMPOUND_ASSIGNMENT_OPERATOR:
        return "COMPOUND_ASSIGNMENT_OPERATOR";
        break;
    case INCREMENT_OPERATOR:
        return("INCREMENT_OPERATOR");
        break;
    case ASSIGNMENT_OPERATOR:
        return("ASSIGNMENT_OPERATOR");
        break;
    case SEMICOLON:
        return("SEMICOLON");
        break;
    case ADDITION_OPERATOR:
        return("ADDITION_OPERATOR");
        break;
    case STAR:
        return("STAR");
        break;
    case LITERAL_STRING:
        return("LITERAL_STRING");
        break;
    case LITERAL_CHAR:
        return("LITERAL_CHAR");
        break;
    case PERCENT:
        return("PERCENT_OPERATOR");
        break;
    case LITERAL_INT:
        return("LITERAL_INT");
        break;
    case IDENTIFIER:
        return ("IDENTIFIER");
        break;
    case KEYWORD:
        return ("KEYWORD");
        break;
    default:
        return("UNKNOWN");
        break;
    }
}

string getToken(istream& input) {
    char c = input.get();
    while (isspace(c)) {
        c = input.get();
    }

    std::string token;

    if (c == ';' || c == '.')
    {
        token += c;
        return token;
    }
    else
        if (c == '\"')
        {
            do
            {
                token += c;
                c = input.get();
            } while (c != '\"');
            if (c == '\"') token += c;
            return token;
        }
        else
            if (c == '\'')
            {
                do
                {
                    token += c;
                    c = input.get();
                } while (c != '\'');
                if (c == '\'') token += c;
                return token;
            }
            else
                if (isalpha(c) || c == '_')
                {
                    // identifier or keyword
                    while (isalnum(c) || c == '_')
                    {
                        token += c;
                        c = input.get();
                    }
                    input.unget();
                    return token;
                }
                else if (isdigit(c))
                {
                    // literal
                    while (isdigit(c)) {
                        token += c;
                        c = input.get();
                    }
                    input.unget();
                    return token;
                }
                else
                    // punctuator- ***causing lots of enhancement problems***
                    if (ispunct(c))
                    {
                        while (ispunct(c))
                        {
                            token += c;
                            c = input.get();
                            if (c == '"') break; //correcting an error
                            if (c == '\'') break;//correcting another error
                            if (c == ';') break; //correcting another error
                            if ((token == "=") && (c == '+')) //correcting another error
                            {
                                break;
                            }
                        }
                        input.unget();
                        return token;
                    }
                    else {
                        // unknown
                        token += c;
                        return token;
                    }
}

TokenType getTokenType(const string& token)
{
    // operators	
    if (token == "++") return INCREMENT_OPERATOR;
    if (token == "+=") return COMPOUND_ASSIGNMENT_OPERATOR;
    if (token == "+")  return ADDITION_OPERATOR;
    if (token == "=") return ASSIGNMENT_OPERATOR;

    // literals
    if ((token[0] == '\"') && (token[token.length() - 1] == '\"')) return LITERAL_STRING;
    if ((token[0] == '\'') && (token[2] == '\'')) return LITERAL_CHAR;

    // punctuators
    if (token == ";") return SEMICOLON;

    // keywords
    static const std::string keywords[] = {
      "auto", "break", "case", "char", "const", "continue", "default", "do",
      "double", "else", "enum", "extern", "float", "for", "goto", "if",
      "inline", "int", "long", "register", "restrict", "return", "short",
      "signed", "sizeof", "static", "struct", "switch", "typedef", "union",
      "unsigned", "void", "volatile", "while"
    };
    for (const auto& keyword : keywords)
    {
        if (token == keyword) {
            return KEYWORD;
        }
    }

    // operators
    static const string operators[] =
    {
      "=", "==", "!=", "<", ">", "<=", ">=", "+", "-", "*", "/", "%", "++", "--",
      "&", "|", "^", "~", "<<", ">>", "&&", "||", "!", ".", "->", "::", "+=",
      "-=", "*=", "/=", "%=", "&=", "|=", "^=", "<<=", ">>="
    };
    for (const auto& op : operators)
    {
        if (token == op)
        {
            return OPERATOR;
        }
    }

    // literals
    if (isdigit(token[0]))
    {
        return LITERAL_INT;
    }

    // identifiers
    if (isalpha(token[0]) || token[0] == '_')
    {
        symbolTable[token]++;
        return IDENTIFIER;
    }

    return UNKNOWN;
}

int main(int argc, char* argv[]) {
    if (argc != 2) {
        std::cerr << "Usage: " << argv[0] << " <filename>\n";
        return 1;
    }

    /////////////////////////////////////////////////////////////////////////
    // C++ Input File under input variable 
    //////////////////////////////////////////////////////////////////////// 
    ifstream input(argv[1]);
    if (!input) {
        std::cerr << "Error: Unable to open file " << argv[1] << '\n';
        return 2;
    }
    //////////////////////////////////////////////////////////////////////////
    // Tokenize C++ PROGRAM 
    //////////////////////////////////////////////////////////////////////////
    cout << "-----------PRINTING TOKENS--------------------------" << endl;
    string token;
    while (input) {
        token = getToken(input);
        if (!token.empty()) {
            cout << token << '\t' << getTokenTypeValueAsString(getTokenType(token)) << '\n';
        }
    }
    //////////////////////////////////////////////////////////////////////////
    // HOW TO ACCESS AND PRINT SYMBOL TABLE IDENTIFIERS AND THEIR COUNT VALUE
    //////////////////////////////////////////////////////////////////////////
    cout << "-----------PRINTING SYMBOL TABLE CONTENT-------------" << endl;
    for (auto x : symbolTable)
        cout << x.first << "\t" << x.second << endl;


    return 0;
}

