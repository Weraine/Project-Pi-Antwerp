using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class PanelProject : MonoBehaviour {

   public GameObject listOfPanels = null; ///this is where all the panels needs to be put in
   public GameObject panel = null; //this is a panel of 1 project
   public Image projectImage; //image of a project
   public Text projectTitelText; //text of a project
   public Text projectDescrText; //the short description of a project;
   public GameObject emptySpot = null; //this is for the empty slot at the bottom of the page
  
   public const float startValueScrollbar = 1f; //makes sure the scrollbar is always starting at the top of the page
   public Scrollbar bar = null; //drop the scrollbar in here

    //testimages
   public Sprite testImage1;
   public Sprite testImage2;
   public Sprite testImage3;

   private int numberOfProjects = 10; //the number of total projects

  //prep for database
   private Image[] databaseImages;
   private Text[] databaseTitels;
   private Text[] databaseDescriptions;

	void Start () {
    databaseImages = new Image[numberOfProjects];
    databaseTitels = new Text[numberOfProjects];
    databaseDescriptions = new Text[numberOfProjects];

    for (int i = 0; i < numberOfProjects; i++) //for every project
    { 
      switch (i)
      { 
        case 0:
          projectTitelText.text = "Project 1: prullenbakken";
          projectImage.sprite = testImage1;
          projectDescrText.text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dignissim massa ac arcu pellentesque, eu pulvinar enim placerat. Quisque a neque consequat, pellentesque mauris vitae, euismod dolor. Mauris at arcu in leo congue rutrum vel vitae erat. Donec tincidunt augue sed leo scelerisque, vel dictum lacus convallis. Nullam cursus aliquet bibendum. Aliquam erat volutpat. Sed non odio fringilla, malesuada sem nec, hendrerit arcu. Etiam auctor aliquet dictum. ";
          break;
        case 1:
          projectTitelText.text = "Verkeersveiligheid";
          break;
        case 2:
          projectTitelText.text = "Cultuur in Antwerpen";
          projectImage.sprite = testImage2;
          break;
        default:
          projectImage.sprite = testImage3;
          projectDescrText.text = "test";
          break;
      }

    //make a new panel with all the parameters from above and place it within listOfPanels
    GameObject childObject = Instantiate(panel);
    childObject.transform.parent = listOfPanels.transform;
    }

    //make the empty space at the bottom
    GameObject empty = Instantiate(emptySpot) as GameObject;
    empty.transform.parent = listOfPanels.transform;

   
    if (bar != null) //if there is a scrollbar, place it at the top of the page (loaded at last for the best result)
    {
      bar.value = startValueScrollbar;
    }     
	}
}
