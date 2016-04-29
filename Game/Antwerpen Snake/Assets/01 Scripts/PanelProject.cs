using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class PanelProject : MonoBehaviour {

   public GameObject listOfPanels = null;
   public GameObject panel = null;
   public GameObject emptySpot = null;
   
  //en voor de scrollbar bij de lijst van projecten
   public const float startValueScrollbar = 1f;
   public Scrollbar bar = null;

	void Start () {

    for (int i = 0; i < 3; i++)
    {
    GameObject childObject = Instantiate(panel);
    childObject.transform.parent = listOfPanels.transform;
    }
    GameObject empty = Instantiate(emptySpot) as GameObject;
    empty.transform.parent = listOfPanels.transform;

    if (bar != null) //zorgt ervoor dat de scrollbar bovenaan de lijst begint en moet hier pas geladen worden want anders staat de bar niet goed
    {
      bar.value = startValueScrollbar;
    }     
	}
}
