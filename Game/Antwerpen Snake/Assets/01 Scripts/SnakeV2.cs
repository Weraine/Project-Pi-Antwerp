using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class SnakeV2 : TouchLogic {

  private Vector3 finger; //coördinates of fingertouch
  private Transform snakeTrans, camTrans; //transform from snake and camera
  public float speed = 5f; //speed of the snake

  void Start()
  {
    snakeTrans = this.transform; //save startposition and -rotation of the snake
    camTrans = Camera.main.transform; // save de startposition and -rotation of the camera
  }

  void LookAtFinger() //move and look at fingertouch
  {
    //looks at the touchinput (which only has x and y) and then calculate the position bewteen the snake and camera, to prevent te snake of going towards or away from the camera
    Vector3 tempTouch = new Vector3(Input.GetTouch(touch2Watch).position.x, Input.GetTouch(touch2Watch).position.y,
        camTrans.position.y - snakeTrans.position.y);
    finger = Camera.main.ScreenToWorldPoint(tempTouch); //translates the touchinput from the screen into the world

    snakeTrans.LookAt(finger); //looks at the finger position and rotates to it
    snakeTrans.Translate(Vector3.forward * speed * Time.deltaTime); //moves the snake towards the touch
  }

  void OnTouchMoved() //if the touch has moved
  {
    LookAtFinger();
  }

  void OnTouchStayed() //if the touch is stationary
  {
    LookAtFinger();
  }

  void OnTouchBegan() //if there is a touch
  {
    touch2Watch = TouchLogic.currTouch; //the currtouch is converted to the touch that the whole script has to look at
  }

  void OnTouchEnded() //if a touch has ended (needed to be here of unity might give an error)
  {
  }
}
