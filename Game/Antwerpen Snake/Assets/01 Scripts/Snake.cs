using UnityEngine;
using System.Collections;
using System.Collections.Generic;
using System.Linq;

public class Snake : MonoBehaviour
{
	public GameObject tailPrefab = null;
	public GameObject food_Diamond = null;
	public GameObject food_Bomb = null;
	public GameObject food_Plane = null;
	public GameObject food_Pencil = null;

	public Transform rBorder = null;
	public Transform leftBorder = null;
	public Transform tBorder = null;
	public Transform bBorder = null;

	public GUIText score_text;
	public GUIText countDown_Text;
	private string dieText = "";
	private int score = 0;
	private int screenWidth = Screen.width;
	private int screenHeight = Screen.height;

	public float speed = 0;
	private const float whenToStart = 3;
	private float timerForMoving = 10;
	private float timerForCountDown = 4;
  private float time = 0f; //tijd in seconden sinds start
	private const short timeToNextMove = 10;
	private const short numberOfAnswers = 4;

	private Vector2 vector = Vector2.up; //beginrichting
	private Vector2 moveVector;

	private List<Transform> tail = new List<Transform>();
	private List<Object> foodList = new List<Object>();

	private bool eat = false;
	private bool isGamePlaying = false;
	private bool isDead = false;

	public Texture2D popUpTex;
	private GUIStyle dieStyle = new GUIStyle();

	void Start()
	{
		dieText = "Je ben gebotst! \n Je score was: \n" + score;

		dieStyle.alignment = TextAnchor.MiddleCenter;
		dieStyle.fontSize = 40;
		dieStyle.fixedHeight = 0;
		dieStyle.stretchHeight = true;
		dieStyle.overflow = new RectOffset(0, 0, 1, 1); ;
		dieStyle.onNormal.background = popUpTex;

		SpawnFood();
		InvokeRepeating("Movement", whenToStart, speed);
	}

	void Update()
	{
			if (Input.GetKey(KeyCode.RightArrow) && timerForMoving > timeToNextMove)
			{
				transform.Rotate(Vector3.forward, -90);
				timerForMoving = 0;
			}
			else if (Input.GetKey(KeyCode.LeftArrow) && timerForMoving > timeToNextMove)
			{
				transform.Rotate(Vector3.forward, 90);
				timerForMoving = 0;
			}
			moveVector = vector / 3f;
			timerForMoving++;

		if (!isGamePlaying) { CountDown(); }
	}

	public void SpawnFood()//spawn food within borders
	{
		short i = 0;
		do
		{
			float x = Random.Range(leftBorder.position.x + 0.5f, rBorder.position.x - 0.5f);
			float y = Random.Range(bBorder.position.y + 0.5f, tBorder.position.y - 0.5f);

			float playerX = transform.position.x;
			float playerY = transform.position.y;

			if (x != playerX && y != playerY)
			{
				if (i == 0) { foodList.Insert(0, Instantiate(food_Diamond, new Vector2(x, y), Quaternion.identity)); }
				if (i == 1) { foodList.Insert(0, Instantiate(food_Bomb, new Vector2(x, y), Quaternion.identity)); }
				if (i == 2) { foodList.Insert(0, Instantiate(food_Pencil, new Vector2(x, y), Quaternion.identity)); }
				if (i == 3) { foodList.Insert(0, Instantiate(food_Plane, new Vector2(x, y), Quaternion.identity)); }
				i++;
			}
		} while (i < numberOfAnswers);
	}

	void Movement() //move entire snake
	{
		Vector2 taPos = transform.position;
		Quaternion taRot = transform.rotation;

		if (eat)
		{
			if (speed > 0.002f)
			{
				speed = speed - 0.002f;
			}
      GameObject g = (GameObject)Instantiate(tailPrefab, taPos, taRot);

			tail.Insert(0, g.transform);
			eat = false;
		}
		else if (tail.Count > 0)
		{
			tail.Last().position = taPos;
			tail.Last().rotation = taRot;
			tail.Insert(0, tail.Last());
			tail.RemoveAt(tail.Count - 1);
		}
		transform.Translate(moveVector);
	}

	void CountDown()
	{
    time = Time.fixedTime;

    if (time % 1 == 0)
			{
				timerForCountDown--;
				countDown_Text.text = timerForCountDown.ToString();
			}
		
		if (timerForCountDown == 0)
		{
			Destroy(countDown_Text);
			isGamePlaying = true; 
		}
	}


	void OnTriggerEnter2D(Collider2D c)
	{

		if (c.tag.StartsWith("food"))
		{
			eat = true;
			foreach (Object food in foodList) { Destroy(food); } //vernietigt de objecten
			foodList.Clear(); //maakt de lijst leeg

			SpawnFood();
			Debug.Log(c.tag + " grabbed!");
			score++;
			score_text.text = score.ToString();
		}
		else if (c.CompareTag("Player"))//veiligheid inbouwen zodat je niet tegen jezelf kan botsen
		{ }
		else //doodgaan
		{
			isDead = true;
		}
	}

	private void OnGUI()
	{

		if (GUI.Button(new Rect(screenWidth * 0.05f, screenHeight * 0.75f, 200, 100), "Linksom \n Draaien") && timerForMoving > timeToNextMove)
		{
			transform.Rotate(Vector3.forward, 90);
			timerForMoving = 0;
		}

		if (GUI.Button(new Rect(screenWidth * 0.7f, screenHeight * 0.75f, 200, 100), "Rechtsom \n Draaien") && timerForMoving > timeToNextMove)
		{
			transform.Rotate(Vector3.forward, -90);
			timerForMoving = 0;
		}

		if (isDead)
		{
			CancelInvoke("Movement");
			GUI.DrawTexture(new Rect(screenWidth * 0.1f, screenHeight * 0.1f, screenWidth * 0.80f, screenHeight * 0.75f), popUpTex); //achtergrond 
			GUI.Box(new Rect(screenWidth * 0.1f, screenHeight * 0.1f, screenWidth * 0.80f, screenHeight * 0.75f), "Je ben gebotst! \n Je score was: \n" + score, dieStyle);
			if (GUI.Button(new Rect(screenWidth * 0.25f, screenHeight * 0.70f, screenWidth * 0.5f, screenHeight * 0.10f), "<size=20>Opnieuw proberen</size>"))
			{
				Application.LoadLevel("SnakeGame"); //herbegin spel
			}
		}
	}
}
