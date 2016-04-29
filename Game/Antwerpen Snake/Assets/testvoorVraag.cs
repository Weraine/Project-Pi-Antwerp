using UnityEngine;
using System.Collections;

public class testvoorVraag : MonoBehaviour {
  public GUIText antwoordA_Text;
  public GUIText antwoordB_Text;
  public GUIText antwoordC_Text;
  public GUIText antwoordD_Text;

  public GameObject diamand;
  public GameObject bike;
  public GameObject choco;
  public GameObject bomb;

  private Vector3 posDiamand;
  private Vector3 posBike;
  private Vector3 posChoco;
  private Vector3 posBomb;

	// Use this for initialization
	void Start () {
    posDiamand = antwoordA_Text.transform.position;
    posBike = antwoordB_Text.transform.position;
    posChoco = antwoordC_Text.transform.position;
    posBomb = antwoordD_Text.transform.position;

    Instantiate(diamand, posDiamand, new Quaternion());
    Instantiate(bike, posBike, new Quaternion());
    Instantiate(choco, posChoco, new Quaternion()); 
    Instantiate(bomb, posBomb, new Quaternion());

	}
	
	// Update is called once per frame
	void Update () {
	
	}
}
