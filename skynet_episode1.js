var inputs = readline().split(' ');
var N = parseInt(inputs[0]); // the total number of nodes in the level, including the gateways
var L = parseInt(inputs[1]); // the number of liens
var E = parseInt(inputs[2]); // the number of exit gateways


var liens = [];
  for (var i = 0; i < L; i++) {
    var inputs = readline().split(' ');
    var N1 = parseInt(inputs[0]); // N1 and N2 defines a lien between these nodes
    var N2 = parseInt(inputs[1]);
    liens.push(N1+" "+N2)
    liens.push(N2+" "+N1)
  
    
   
 }

var sorties =  Array();
for (var i = 0; i < E; i++) {
    var EI = parseInt(readline()); // the index of a gateway node
   sorties.push(EI)
}



while (true) {
    
    
    var SI = parseInt(readline()); // The index of the node on which the Skynet agent is positioned this turn
     var lien=""; 
      var lienP=""; 
     var n1=0;
      var n2=0;
  
  
  
     for(j = 0; j < sorties.length; j++)
  {
      EI = sorties[j];
       printErr('Getway exit  = ...'+EI);
      
        for(i = 0; i < liens.length; i++)
  {  
     
   
     
      if(liens.indexOf(EI+" "+SI)!=-1)
      {

      lien = EI+" "+SI;
      lienP=lien;
      
      break;
      }
      else {
           n1=liens[i].split(" ")[0];
      n2=liens[i].split(" ")[1] ;
        
        
        if(liens.indexOf(n2+" "+SI)!=-1 && liens.indexOf(EI+" "+n2)!=-1)
         {
             
         lien = n2+" "+SI;
         break;
         }
          
          }
  }
  
  
  
  }
  
if(lienP !=="")
  {
    lien=lienP;
      }

print(lien)
                               
}
