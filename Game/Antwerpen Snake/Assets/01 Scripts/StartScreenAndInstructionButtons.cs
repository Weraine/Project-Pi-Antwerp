using UnityEngine;
using System.Collections;

public class StartScreenAndInstructionButtons : MonoBehaviour {

  public void StartGame()
  {
    Application.LoadLevel("SnakeGame");
  }

  public void ShowInstructions()
  {
    Application.LoadLevel("Instructions");
  }
}
