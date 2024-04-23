#include <iostream>
#include <vector>
#include <string>

using namespace std;


int main()
{
    vector <string> listaWycieczkowa;

    listaWycieczkowa.push_back("AAA");
    listaWycieczkowa.push_back("BBB");
    listaWycieczkowa.push_back("CCC");

    listaWycieczkowa[1] = "DDD";

    for (string pozycja : listaWycieczkowa)
        cout << pozycja << endl;



    return 0;
}