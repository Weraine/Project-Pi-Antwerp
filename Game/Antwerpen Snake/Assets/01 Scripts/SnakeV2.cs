using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class SnakeV2 : TouchLogic {

  private Vector3 finger; //coördinaten vinger
  private Transform snakeTrans, camTrans; //transform van snake en camera
  public float speed = 5f; //snelheid snake

  void Start()
  {
    Screen.orientation = ScreenOrientation.Landscape; //zet het scherm op landscape
    snakeTrans = this.transform; //slaat de beginpositie en rotatie op van de snake
    camTrans = Camera.main.transform; ////slaat de positie en rotatie op van de camera
  }

  void LookAtFinger() //beweegt en kijkt naar de vinger
  {
    Vector3 tempTouch = new Vector3(Input.GetTouch(touch2Watch).position.x, Input.GetTouch(touch2Watch).position.y,
        camTrans.position.y - snakeTrans.position.y); //kijkt naar de x- en y-pos van de touch en bereken afstand tussen camera en character (is nodig voor vector3 positie)
    finger = Camera.main.ScreenToWorldPoint(tempTouch); //zet het scherm om naar een world space (naar vector 3 mbt het scherm)

    snakeTrans.LookAt(finger); //kijk naar de positie van de vinger
    snakeTrans.Translate(Vector3.forward * speed * Time.deltaTime); //verplaatst de snake vooruit
  }

  void OnTouchMoved() //als de touch bewogen is
  {
    LookAtFinger();
  }

  void OnTouchStayed() //als de touch stilstaat
  {
    LookAtFinger();
  }

  void OnTouchBegan() //als er een touch is
  {
    touch2Watch = TouchLogic.currTouch; //de huidige touch wordt omgezet naar de touch waarnaar gekeken moet worden
  }

  void OnTouchEnded() //als de touch stopt (staat erbij want anders geeft unity aan dat hiervoor niets opegevangen wordt
  {
  }
}
