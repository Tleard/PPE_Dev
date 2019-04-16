#----------Jeux de cartes: Bataille----------#

from random import randrange
from time import sleep

#defintion des classes

class JeuxDeCarte(object):
    "Definition d'un jeu de cartes"

    couleur = ("Coeur", "Carreau", "Trefle", "Pique")
    valeur = (2, 3, 4, 5, 6, 7, 8, 9, 10, "Valet", "Dame", "Roi", "As")

    def __init__(self):
        "construction de la liste des 52 cartes"
        self.jeu = []
        for coul in range(4):
            for val in range(13):
                self.jeu.append((val, coul))

    def nom_carte(self, c):
        "renvoi le nom de la carte"
        return "%s de %s" (self.valeur[c[0]], self.couleur[c[1]])

    def battre(self):
        "permet de melanger les cartes"
        a = 0
        b = len(self.jeu)
        while a < randrange(100, 200):
            i = randrange(b)
            n = randrange(b)
            self.jeu[i], self.jeu[n] = self.jeu[n], self.jeu[i]
            a = a + 1

    def tirer(self):
        "Tirage de la premiÃ¨re carte de la pile"
        t = len(self.jeu)
        if t >0:
            carte = self.jeu[0]
            del(self.jeu[0])
            return carte

class Jeux2(JeuxDeCarte):
    "defintion des deux jeu"

    def __init__(self):
        self.jeuA = []
        self.jeuB = []
        JeuxDeCarte.__init__(self)


    def tirerA(self):
        "Tirage de la premiÃ¨re carte de la pile"
        t = len(self.jeuA)
        if t >0:
            carte = self.jeuA[0]
            del(self.jeuA[0])
            return carte

    def tirerB(self):
        "Tirage de la premiÃ¨re carte de la pile"
        t = len(self.jeuB)
        if t >0:
            carte = self.jeuB[0]
            del(self.jeuB[0])
            return carte

    def creer_2jeux(self):
        "creer les deux jeux"
        self.battre()
        for i in range(52):
            if i%2 == 0:
                self.jeuA.append(self.tirer())
            else:
                self.jeuB.append(self.tirer())

    def match(self):
        "compare les cartes et les remet au gagnant"
        carteA = self.tirerA()
        carteB = self.tirerB()
        gain = []
        gain.append(carteA)
        gain.append(carteB)

        print
        carteA.nom_carte(carteA)
        print
        "vs"
        print
        carteB.nom_carte(carteB)

        if carteA[0] > self.carteB[0]:
            while i < len(gain):
                self.jeuA.append(gain[i])
                i = i + 1

            for i in range(len(gain)):
                del gain[0]

            print
            "Vous gagnez!"

        elif self.carteB[0] > self.carteA[0]:
            while i < len(gain):
                self.jeuB.append(gain[i])
                i = i + 1

            for i in range(len(gain)):
                del gain[0]

            print
            "L'ordinateur gagne!"

        else:
            print
            "Bataille !"

        print
        "Il vous reste %s carte(s)" % (len(self.jeuA))
        print
        "Il reste %s carte(s) a l'ordinateur" % (len(self.jeuB))

        def verif(self):
            if len(self.jeuA) == 0 or len(self.jeuB) == 0:
                return False



#programme principal

jeux = Jeux2()
print
"distribution des cartes..."
sleep(2)
jeux.creer_2jeux()
print
"les jeux sont creer!"

raw_input('appuyer sur Entree pour tirer une carte')
a = True
while a == True:
    jeux.match()
    a = jeux.verif()
    raw_input('appuyer sur Entree pour tirer une carte')

if len(jeux.jeuA) == 0:
    print
    "Vous avez perdu..."

else:
    print
    "Vous avez gagner!!"






voila, j'espere que vous m'aiderez!