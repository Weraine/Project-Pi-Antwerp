using UnityEngine;
using System.Collections;

public class Navbar : MonoBehaviour {

	public Texture2D buttonHome;
	public Texture2D buttonList;
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
		if (GUI.Button(new Rect(0, 0, iconSize+7, iconSize+7), buttonHome, GUIStyle.none))
		{
      Application.OpenURL("http://pi.multimediatechnology.be/");
		}
		if (GUI.Button(new Rect(screenWidth * 0.2f, screenHeight * 0.01f, iconSize, iconSize), buttonList, GUIStyle.none))
		{
			Application.LoadLevel("ListOfProjects");
		}

		if (GUI.Button(new Rect(screenWidth * 0.4f, screenHeight * 0.01f, iconSize, iconSize), buttonGame, GUIStyle.none))
		{
			Application.LoadLevel("MainScreenSnake");
		}

		if (GUI.Button(new Rect(screenWidth * 0.6f, screenHeight * 0.01f, iconSize, iconSize), buttonThrophy, GUIStyle.none))
		{
			Application.LoadLevel("TrophyList");
		}	 
	}
}
