<?php
// Connecting, selecting database
$dbconn = pg_connect("host=ec2-54-83-56-31.compute-1.amazonaws.com dbname=d9m4a5line7roh user=aghezwnhlovcgi password=G1Rqb8FklwiOiwI4an8AoNOj86")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'BEGIN;


CREATE TABLE "User"(
	"id" Integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"name" Text NOT NULL,
	"password" Text NOT NULL );

CREATE TABLE "Exercisecategory"(
	"id" Integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"code" Text NOT NULL,
	"name" Text NOT NULL );


CREATE TABLE "Exercise"(
	"id" Integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"info" Text,
	"Exercisecategory_id" Integer,
	CONSTRAINT "lnk_Exercisecategory_Exercise" FOREIGN KEY ( "Exercisecategory_id" ) REFERENCES "Exercisecategory"( "id" )
 );

CREATE INDEX "index_Exercisecategory_id" ON "Exercise"( "Exercisecategory_id" );



CREATE TABLE "tbl_Exercise_MM_User"(
	"Exercise_id" Integer,
	"User_id" Integer,
	"points" Integer NOT NULL,
	CONSTRAINT "lnk_User_MM_Exercise" FOREIGN KEY ( "User_id" ) REFERENCES "User"( "id" )
,
	CONSTRAINT "lnk_Exercise_MM_User" FOREIGN KEY ( "Exercise_id" ) REFERENCES "Exercise"( "id" )
 );

CREATE INDEX "index_User_id" ON "tbl_Exercise_MM_User"( "User_id" );



CREATE INDEX "index_Exercise_id" ON "tbl_Exercise_MM_User"( "Exercise_id" );


COMMIT';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
?>