using UnityEngine;
using System;
using System.Collections;
using System.Data;
using MySql.Data.MySqlClient;

public class DatabaseLogic: MonoBehaviour
{

  //NOG NIET GETEST en staat ff in commentaar zodat de rest niet beïntvloedt kan worden
  /*
  private static IDbConnection dbConnection;

  public void Start()
  {
    openSqlConnection();
  }

  // On quit
  public void OnApplicationQuit()
  {
    closeSqlConnection();
  }

  // Connect to database
  private static void openSqlConnection()
  {
    string connectionString = "Server=localhost;" +
        "Database=yourDatabaseName;" +
        "User ID=yourUserId;" +
        "Password=yourPassword;" +
        "Pooling=false";
    dbConnection = new MySqlConnection(connectionString);
    dbConnection.Open();
    Debug.Log("Connected to database.");
  }

  // Disconnect from database
  private static void closeSqlConnection()
  {
    dbConnection.Close();
    dbConnection = null;
    Debug.Log("Disconnected from database.");
  }

  // MySQL Query
  public static void doQuery(string sqlQuery)
  {
    IDbCommand dbCommand = dbConnection.CreateCommand();
    dbCommand.CommandText = sqlQuery;
    IDataReader reader = dbCommand.ExecuteReader();
    reader.Close();
    reader = null;
    dbCommand.Dispose();
    dbCommand = null;
  }*/
}


