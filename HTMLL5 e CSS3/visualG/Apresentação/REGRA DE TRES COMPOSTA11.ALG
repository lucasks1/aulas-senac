Algoritmo "Regra de tres composta"
// Disciplina  :  [Linguagem e Lógica de Programação]
// Professor   : Antonio Carlos Nicolodi

Var
   gdsa1,a2:inteiro
   gdsb1,b2:inteiro
   gdsc1,c2:inteiro
   multin,multin2,multin3,multid,multid2,multid3,divi1,div2,x: real



Inicio
   escreval ("Quais as grandesas a: ")
   leia(gdsa1,a2)

   escreval ("Quais as grandesas  b: ")
   leia(gdsb1,b2)

   escreval ("Quais as grandesas c: ")
   leia(gdsc1,c2)

   se gdsa1=0   entao
      multin2:=(gdsb1+gdsc1)

   senao
      se gdsb1=0 entao
         multin3:=(gdsa1*gdsc1)

      senao

         multin:=(gdsa1*gdsb1)


         se a2=0   entao
            multid2:=(b2*c2)

         senao
            se b2=0 entao
               multid3:=(a2*c2)

            senao
               multid:=(a2*b2)







            fimse
         fimse
      fimse
   fimse
Fimalgoritmo