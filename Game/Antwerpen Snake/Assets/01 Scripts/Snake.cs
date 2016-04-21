using UnityEngine;
using System.Collections;
using System.Collections.Generic;
using System.Linq;

public class Snake : MonoBehaviour
{
	public GameObject tailPrefab = null;
	public GameObject food = null;
	public Transform rBorder = null;
	public Transform leftBorder = null;
	public Transform tBorder = null;
	public Transform bBorder = null;
	public GUIText score_text;
	private int score = 0;
	private int screenWidth = Screen.width;
	private int screenHeight = Screen.height;

	public float speed = 0;
	private float whenToStart = 0.3f;
	private float timer = 10;
	private short timeToNextMove = 10;

	Vector2 vector = Vector2.up;
	Vector2 moveVector;

	List<Transform> tail = new List<Transform>();

	bool eat = false;

	void Start()
	{
		SpawnFood();
		InvokeRepeating("Movement", whenToStart, speed);
	}

	void Update()
	{
		if (Input.GetKey(KeyCode.RightArrow) && timer > timeToNextMove)
		{
			transform.Rotate(Vector3.forward, -90);
			timer = 0;
		}
		else if (Input.GetKey(KeyCode.LeftArrow) && timer > timeToNextMove)
		{
			transform.Rotate(Vector3.forward, 90);
			timer = 0;
		}
		moveVector = vector / 3f;
		timer++;
	}

	public void SpawnFood()//spawn food within borders
	{
		int x = (int)Random.Range(leftBorder.position.x + 0.5f, rBorder.position.x - 0.5f);
		int y = (int)Random.Range(bBorder.position.y+0.5f, tBorder.position.y-0.5f);

		Instantiate(food, new Vector2(x, y), Quaternion.identity);
	}

	void Movement()
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

	void OnTriggerEnter2D(Collider2D c)
	{

		if (c.CompareTag("food"))
		{
			eat = true;
			Destroy(c.gameObject);
			SpawnFood();
			Debug.Log("Food grabbed!");
			score++;
			score_text.text = score.ToString();
		}
		else if (c.CompareTag("Player"))//veiligheid inbouwen zodat je niet tegen jezelf kan botsen
		{ }
		else //doodgaan
		{
			Debug.LogError("You hit " + c.tag + " and died.");
		}
	}

	private void OnGUI()
	{
		if (GUI.Button(new Rect(screenWidth * 0.05f, screenHeight* 0.92f, 200, 100), "Linksom \n Draaien") && timer > timeToNextMove)
		{
			transform.Rotate(Vector3.forward, 90);
			timer = 0;
		}

		if (GUI.Button(new Rect(screenWidth * 0.7f, screenHeight * 0.92f, 200, 100), "Rechtsom \n Draaien"))
		{
			transform.Rotate(Vector3.forward, -90);
			timer = 0;
		}
	}

}
