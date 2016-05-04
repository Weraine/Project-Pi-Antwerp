using UnityEngine;
using System.Collections;

public class Navbar : MonoBehaviour {

	public Texture2D buttonHome; //textuur voor HomeButton (A-logo)
	public Texture2D buttonWeb; //textuur voor WebButton (computer)
	public Texture2D buttonGame; //textuur voor gameButton (gamepad)
	private int screenWidth = Screen.width; //screenwidth op voorhand inlezen
	private int screenHeight = Screen.height; //screenheight op voorhand inlezen
	private float iconSize; //grootte van de icoontjes

	void Start () {
		iconSize = screenWidth * 0.15f; //icoongrootte vastleggen
	}
	
	void Update () {
 
	}

	private void OnGUI() //GUIStyle.none voor border rond buttons te verwijderen
	{

    if (Screen.orientation == ScreenOrientation.Portrait) //als het scherm portrait gepositioneerd is
		{ 
			if (GUI.Button(new Rect(0, 0, iconSize, iconSize), buttonHome, GUIStyle.none)) //lijst van projecten
			{
				Application.LoadLevel("ListOfProjects");
			}
			if (GUI.Button(new Rect(screenWidth * 0.25f, screenHeight * 0.01f, iconSize, iconSize), buttonGame, GUIStyle.none)) //game
			{
				Application.LoadLevel("MainScreenSnake");
			}

			if (GUI.Button(new Rect(screenWidth * 0.75f, screenHeight * 0.01f, iconSize, iconSize), buttonWeb, GUIStyle.none)) //gaat naar home web
			{
				Application.OpenURL("http://pi.multimediatechnology.be/");
			}
		}

    else if (Screen.orientation == ScreenOrientation.Landscape) //als het scherm landscape gepositioneerd is
		{ 
			if (GUI.Button(new Rect(0, 0, iconSize, iconSize), buttonHome, GUIStyle.none)) //lijst van projecten
			{
				Application.LoadLevel("ListOfProjects");
			}
      if (GUI.Button(new Rect(screenWidth * 0.01f, screenHeight * 0.25f, iconSize, iconSize), buttonGame, GUIStyle.none)) //game
			{
				Application.LoadLevel("MainScreenSnake");
			}

      if (GUI.Button(new Rect(screenWidth * 0.01f, screenHeight * 0.75f, iconSize, iconSize), buttonWeb, GUIStyle.none)) //gaat naar home web
			{
				Application.OpenURL("http://pi.multimediatechnology.be/");
			}
		}
	}
}
