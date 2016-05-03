using UnityEngine;
using System.Collections;

public class Navbar : MonoBehaviour {

	public Texture2D buttonHome;
	public Texture2D buttonWeb;
	public Texture2D buttonGame;
	public Texture2D buttonThrophy;
	private int screenWidth = Screen.width;
	private int screenHeight = Screen.height;
	private float iconSize;

	void Start () {
		iconSize = screenWidth * 0.1f;
	}
	
	void Update () {
 
	}

	private void OnGUI() //GUIStyle.none voor border rond buttons te verwijderen
	{

		if (Screen.orientation == ScreenOrientation.Portrait)
		{ 
			if (GUI.Button(new Rect(0, 0, iconSize + 7, iconSize + 7), buttonHome, GUIStyle.none)) //lijst van projecten
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

    else if (Screen.orientation == ScreenOrientation.Landscape)
		{ 
			if (GUI.Button(new Rect(0, 0, iconSize + 7, iconSize + 7), buttonHome, GUIStyle.none)) //lijst van projecten
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
