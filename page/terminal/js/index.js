document.addEventListener('DOMContentLoaded', function() {

  var expr = document.getElementById('terminalTextInput'),
      pretty = document.getElementById('pretty'),
      result = document.getElementById('result'),
      parenthesis = 'keep',
      implicit = 'hide';
  var node = null;


  document.getElementsByTagName('form')[0].onsubmit = function(evt) {
    evt.preventDefault(); // Preventing the form from submitting
    checkWord(); // Do your magic and check the entered word/sentence
    window.scrollTo(0,150);
  }

  // Get the focus to the text input to enter a word right away.
  document.getElementById('terminalTextInput').focus();

  // Getting the text from the input
  var textInputValue = document.getElementById('terminalTextInput').value.trim();

  //Getting the text from the results div
  var textResultsValue = document.getElementById('terminalReslutsCont').innerHTML;

  // Clear text input
  var clearInput = function(){
    document.getElementById('terminalTextInput').value = "";
  }

  // Scrtoll to the bottom of the results div
  var scrollToBottomOfResults = function(){
    var terminalResultsDiv = document.getElementById('terminalReslutsCont');
    terminalResultsDiv.scrollTop = terminalResultsDiv.scrollHeight;
  }

  // Scroll to the bottom of the results
  scrollToBottomOfResults();

  // Add text to the results div
  var addTextToResults = function(textToAdd){
    document.getElementById('terminalReslutsCont').innerHTML += "<p>" + textToAdd + "</p>";
    scrollToBottomOfResults();
  }
	addTextToResults('Bienvenue sur TIM(Terminal MathBox) Version Betta par S@n1X D4rk3R');

  // Getting the list of keywords for help & posting it to the screen
  var postHelpList = function(){
    // Array of all the help keywords
    var helpKeyWords = [
      "- 'Google + mot clee ou terme mathematique &agrave;'' chercher (ex. google cosinus)",
      "- 'Wiki + mot clee ou terme mathematique' sur wikipedia (ex. wiki sinus)",
      "- 'Listfunctions' pour lister toutes les fonctions integr&eacute;s dans IUC-MathBox",
      "* Vous pouvez creer des fonctions qui seront ajout&eacute;s au tableau de commandes.",
    ].join('<br>');
    addTextToResults(helpKeyWords);
  }

  var Listfunctions = function(){
    // Array of all the help keywords
    var helpKeyWords = [
      "- Tous vos calculs d'algebre elementaires",
      "- Tous les calculs sur les matrices ",
      "- Toutes les integrales "
    ].join('<br>');
    addTextToResults(helpKeyWords);
  }


  // Opening links in a new window
  var openLinkInNewWindow = function(linkToOpen){
    window.open(linkToOpen, '_blank');
    clearInput();
  }

// Main function to check the entered text and assign it to the correct function
  var checkWord = function() {
    textInputValue = document.getElementById('terminalTextInput').value.trim(); //get the text from the text input to a variable
    textInputValueLowerCase = textInputValue.toLowerCase(); //get the lower case of the string

    if (textInputValue != ""){ //checking if text was entered
      addTextToResults("<p class='userEnteredText'>> " + textInputValue + "</p>");
      if (textInputValueLowerCase.substr(0,5) == "open ") { //if the first 5 characters = open + space
        openLinkInNewWindow('http://' + textInputValueLowerCase.substr(5));
        addTextToResults("<i>L'URL " + "<b>" + textInputValue.substr(5) + "</b>" + " serra bientot ouverte.</i>");
      } else if (textInputValueLowerCase.substr(0,7) == "google ") {
        openLinkInNewWindow('https://www.google.com/search?q=' + textInputValueLowerCase.substr(7));
        addTextToResults("<i>Recherche sur Google pour " + "<b>" + textInputValue.substr(7) + "</b>" + " en cours...</i>");
      } else if (textInputValueLowerCase.substr(0,5) == "wiki "){
        openLinkInNewWindow('https://wikipedia.org/w/index.php?search=' + textInputValueLowerCase.substr(5));
        addTextToResults("<i>Recherche sur Wikipedia pour " + "<b>" + textInputValue.substr(5) + "</b>" + " en cours....</i>");
      } else{ //Au cas ou ce n'est rien de ce qui a ete predefinis

          if(textInputValueLowerCase=="help"){
              clearInput();
              postHelpList();
          }else if(textInputValueLowerCase=="google"){
              clearInput();
              addTextToResults("Tappez google + un terme &agrave; chercher.");
          }
          else if(textInputValueLowerCase=="Listfunctions"){
              //On devra lister les differentes fonctions ici  
          }
          else{
              try {
              // parse the expression
              node = math.parse(expr.value);

              // evaluate the result of the expression
              result.innerHTML = math.format(node.compile().eval());
              document.getElementById('terminalReslutsCont').innerHTML += "<p>>> "+math.format(node.compile().eval()) + "</p>";
              //scrollToBottomOfResults();
            }
            catch (err) {
              result.innerHTML = '<span style="color: red;">' + err.toString() + '</span>';
              document.getElementById('terminalReslutsCont').innerHTML += '<p>>>><span style="color: red;">' + err.toString() + '</span>' + "</p>";
              //scrollToBottomOfResults();
            }

            try {
              // export the expression to LaTeX
                var latex = node ? node.toTex({parenthesis: parenthesis, implicit: implicit}) : '';
              console.log('LaTeX expression:', latex);

              // display and re-render the expression
              var elem = MathJax.Hub.getAllJax('pretty')[0];
              MathJax.Hub.Queue(['Text', elem, latex]);
            }
            catch (err) {}

            clearInput();
            scrollToBottomOfResults();
          }
          

      }
    }
  };

});