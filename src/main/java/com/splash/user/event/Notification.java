package com.splash.user.event;


import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.NotificationCompat;
//import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.AppCompatActivity;
import android.view.View;


public class Notification extends AppCompatActivity {

    NotificationCompat.Builder notifition;
    private static final int uniqueID = 45612;


    @Override
    protected void onCreate (Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.notificationview);


        notifition = new NotificationCompat.Builder(this);
        notifition.setAutoCancel(true);



    }


    public void notificationbuttonclicked(View view)
    {
        //Build the Notification
        notifition.setSmallIcon(R.drawable.ic_launcher_foreground);
        notifition.setTicker("This is the ticker");
        notifition.setWhen(System.currentTimeMillis());
        notifition.setContentTitle("Here is the title");
        notifition.setContentText("I am the body text of your Notification");

        Intent intent = new Intent(this, Notification.class);
        PendingIntent pendingIntent = PendingIntent.getActivity(this, 0, intent, PendingIntent.FLAG_UPDATE_CURRENT);
        notifition.setContentIntent(pendingIntent);



        //Build Notification and issue it

        NotificationManager nm = (NotificationManager) getSystemService(NOTIFICATION_SERVICE);
        nm.notify(uniqueID, notifition.build());

    }

    public void notibuttonClicked(View view) {

    }
}

