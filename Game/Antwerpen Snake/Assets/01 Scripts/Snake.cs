using UnityEngine;
using System.Collections;
using System.Collections.Generic;
using System.Linq;

public class Snake : MonoBehaviour
{
	public GameObject tailPrefab = null; //staartobject
	public GameObject food_Diamond = null; //antwoordoptie diamandobject
	public GameObject food_Bomb = null; //antwoordoptie bombobject
	public GameObject food_Bike = null; //antwoordoptie papieren vliegtuigobject
	public GameObject food_Choco = null; //antwoordoptie potloodObject

	public Transform r_Border = null; //rechtermuur
	public Transform l_Border = null; //linkermuur
	public Transform t_Border = null; //bovenmuur
	public Transform b_Border = null; //ondermuur

	public GUIText score_text; //tekst waarin de score wordt getoont
	public GUIText countDown_Text; //tekst die aftelt bij het starten van het spel
	private string dieText = ""; //tekst die wordt getoond als je botst tegen iets
	private int score = 0; //de score wordt hierin opgeslagen
	private int screenWidth = Screen.width; //leest de schermbreedte in en slaat deze op
	private int screenHeight = Screen.height; //leest de schermhoogte in en slaat deze op

	private float buttonSize;
	private float speed = 0.25f; //snelheid waarmee de snake beweegt (is omgekeert evenredig)
	private const float whenToStart = 3; //geeft aan over hoeveel seconded de snake moet beginnen met bewegen
	private float timerForMoving = 10; //timer die ervoor zorgt dat je snake niet te snel kan afslaan
	private float timerForCountDown = 4; //de variabele die helpt bij het aftellen in het begin van het spel
	private float timePassed = 0f; //tijd in seconden sinds start
	private const short timeToNextMove = 10; //vaste variabele die zegt wanneer je mag afdraaien
	private const short numberOfAnswers = 4; //aantal mogelijke antwoorden

	private Vector2 vectorDirection = Vector2.up; //beginrichting
	private Vector2 moveVector; //verplaatst de player

	private List<Transform> tailPieces = new List<Transform>(); //lijst die alle staartdelen opslaat
	private List<Object> foods = new List<Object>(); //lijst waarin de mogelijke antwoorden opgeslagen wordt

	private bool hasEaten = false; //heeft de speler een antwoord opgeraapt?
	private bool isGamePlaying = false; //is het spel al begonnen?
	private bool isDead = false; //is de player dood?

	public Texture2D leftButtonTexture; //texture van de button om naar links te draaien
  public Texture2D rightButtonTexture; //texture van de button om naar rechts te draaien
	public Texture2D dieTexture; //texture die gebruikt wordt als je dood gaat
	private GUIStyle dieStyle = new GUIStyle(); //stijl van de kader als je sterft

	void Start()
	{
		buttonSize = screenWidth * 0.5f;
		CreateDieStyle();

		SpawnFood();
    InvokeRepeating("MovementAndEating", whenToStart, speed);
	}

	void Update()
	{
    //deze inputs wegdoen als niet meer nodig is
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
			moveVector = vectorDirection / 3f;
			timerForMoving++;

		if (!isGamePlaying) { CountDown(); } //Is het spel bezig? Zo niet, tel af.
	}

	public void SpawnFood()//spawn food binnen de muren
	{
		short i = 0;
		do
		{
			float x = Random.Range(l_Border.position.x + 0.5f, r_Border.position.x - 0.5f);
			float y = Random.Range(b_Border.position.y + 0.5f, t_Border.position.y - 0.5f);

			float playerX = transform.position.x;
			float playerY = transform.position.y;

			if (x != playerX && y != playerY) //zorgt ervoor dat de food niet op de player gespawnt kunnen worden
			{
				if (i == 0) { foods.Insert(0, Instantiate(food_Diamond, new Vector2(x, y), Quaternion.identity)); }
				if (i == 1) { foods.Insert(0, Instantiate(food_Bomb, new Vector2(x, y), Quaternion.identity)); }
				if (i == 2) { foods.Insert(0, Instantiate(food_Choco, new Vector2(x, y), Quaternion.identity)); }
				if (i == 3) { foods.Insert(0, Instantiate(food_Bike, new Vector2(x, y), Quaternion.identity)); }
				i++;
			}
		} while (i < numberOfAnswers);
	}

	void MovementAndEating() //move player en reageer op het oppakken van iets
	{
		Vector2 taPos = transform.position;
		Quaternion taRot = transform.rotation;

		if (hasEaten) //checkt of er iets opgeraapt is
		{
			GameObject g = (GameObject)Instantiate(tailPrefab, taPos, taRot);

			tailPieces.Insert(0, g.transform);
			hasEaten = false;
		}
		else if (tailPieces.Count > 0) //beweging en rotatie voor staart
		{
			tailPieces.Last().position = taPos;
			tailPieces.Last().rotation = taRot;
			tailPieces.Insert(0, tailPieces.Last());
			tailPieces.RemoveAt(tailPieces.Count - 1);
		}
		transform.Translate(moveVector);
	}

	void CountDown() //aftellen begin
	{
		timePassed = Time.fixedTime;

		if (timePassed % 1 == 0)
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

  void CreateDieStyle()
  {
    dieText = "Je ben gebotst! \n Je score was: \n" + score;

    dieStyle.alignment = TextAnchor.MiddleCenter;
    dieStyle.fontSize = 40;
    dieStyle.fixedHeight = 0;
    dieStyle.stretchHeight = true;
    dieStyle.overflow = new RectOffset(0, 0, 1, 1); ;
    dieStyle.onNormal.background = dieTexture;
  }

	void OnTriggerEnter2D(Collider2D c) //als de snake botst tegen iets
	{

		if (c.tag.StartsWith("food"))
		{
			hasEaten = true;
			foreach (Object food in foods) { Destroy(food); } //vernietigt de objecten
			foods.Clear(); //maakt de lijst leeg

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
		if (!isDead)
		{ 
			//linksom draaien en reset timer voor de volgende afslag
			if (GUI.Button(new Rect(1f, screenHeight * 0.60f, buttonSize, buttonSize), leftButtonTexture, GUIStyle.none) && timerForMoving > timeToNextMove)
			{
				transform.Rotate(Vector3.forward, 90);
				timerForMoving = 0;
			}

			//rechtsom draaien en reset timer voor de volgende afslag
			if (GUI.Button(new Rect(screenWidth -200f, screenHeight * 0.60f, buttonSize, buttonSize), rightButtonTexture, GUIStyle.none) && timerForMoving > timeToNextMove)
			{
				transform.Rotate(Vector3.forward, -90);
				timerForMoving = 0;
			}
		}

		if (isDead)
		{
      CancelInvoke("MovementAndEating"); //stoppen met moven
			//teken de texture, text en box
			GUI.DrawTexture(new Rect(screenWidth * 0.1f, screenHeight * 0.1f, screenWidth * 0.80f, screenHeight * 0.75f), dieTexture); //achtergrond 
			GUI.Box(new Rect(screenWidth * 0.1f, screenHeight * 0.1f, screenWidth * 0.80f, screenHeight * 0.75f), "Je ben gebotst! \n Je score was: \n" + score, dieStyle);
			
			//herbegin spel
			if (GUI.Button(new Rect(screenWidth * 0.25f, screenHeight * 0.70f, screenWidth * 0.5f, screenHeight * 0.10f), "<size=20>Opnieuw proberen</size>"))
			{
				Application.LoadLevel("SnakeGame"); 
			}
		}
	}
}
