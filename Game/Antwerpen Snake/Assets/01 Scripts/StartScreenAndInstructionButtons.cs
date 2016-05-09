using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class StartScreenAndInstructionButtons : MonoBehaviour {
  //class that controls the UI buttons of the main menu of the game, the instructionbuttons and the buttons of the list of projects

  public void StartGame() //start the game
  {
    Application.LoadLevel("NewSnakeGame");
  }

  public void ShowInstructions() //go to the page with instructions
  {
    Application.LoadLevel("Instructions");
  }
  
  public void GoToStartScreenGame() //go to the main menu of the game
  {
    Application.LoadLevel("MainScreenSnake");
  }

  //nog wegdoen = tijdelijk ==> moet met database in panelproject opgeroepen kunnen wordne
  public void TijdelijkNaarHome()
  {
    Application.OpenURL("http://pi.multimediatechnology.be/");
  }
}
