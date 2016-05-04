using UnityEngine;
using System.Collections;

public class TouchLogic : MonoBehaviour //bevat alle touch logica
{

  public static int currTouch = 0; //zo weten andere script naar welke touch er actief is
  public int touch2Watch = 0; //zal gebruikt worden zodat de andere scripts weten naar welke touch gekeken moet worden

  void Update()
  {
    //is er een touch?
    if (Input.touches.Length <= 0)
    {
      //als er niets wordt aangeraakt
    }
    else //als er een touch is
    {
      //er is geen foreach omdat de snake enkel op 1 touch moet reageren, zo negeert de code de andere touches
      if (Input.GetTouch(0).phase == TouchPhase.Began) //als een touch begonnen is
      {
        this.SendMessage("OnTouchBegan"); //stuur een message die de methode "OnTouchBegan" uitvoert
      }
      if (Input.GetTouch(0).phase == TouchPhase.Ended) //als een touch geëindigd is
      {
        this.SendMessage("OnTouchEnded"); //stuur een message die de methode "OnTouchEnded" uitvoert
      }
      if (Input.GetTouch(0).phase == TouchPhase.Moved) //als een touch bewogen is
      {
        this.SendMessage("OnTouchMoved"); //stuur een message die de methode "OnTouchMoved" uitvoert
      }
      if (Input.GetTouch(0).phase == TouchPhase.Stationary) //als een touch stilstaat
      {
        this.SendMessage("OnTouchStayed"); //stuur een message die de methode "OnTouchStayed" uitvoert
      }
    }
  }
}
