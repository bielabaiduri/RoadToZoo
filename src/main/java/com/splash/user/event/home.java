package com.splash.user.event;



import android.animation.Animator;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;
import android.view.ViewAnimationUtils;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.webkit.WebView;

public class home extends AppCompatActivity implements View.OnClickListener{
    private ImageView assignmentCard,payCard;

    CardView mapCard ;
    Intent i ;
    LinearLayout ll;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.home);

        //defining card
        assignmentCard = (ImageView) findViewById(R.id.assignmentCard);
        payCard = (ImageView) findViewById(R.id.payCard);
        mapCard = (CardView) findViewById(R.id.mapCard);



        // add click listener to the card
        assignmentCard.setOnClickListener(this);
        payCard.setOnClickListener(this);
        mapCard.setOnClickListener(this);


    }


    @Override
    public void onClick(View v) {
        Intent i ;

        switch (v.getId()){
            case R.id.assignmentCard : i = new Intent(this,MainActivity.class); startActivity(i); break;
            case R.id. payCard: i = new Intent(this, ticket.class);startActivity(i); break;
            case R.id.mapCard : i = new Intent(this,place.class); startActivity(i); break;
            default:break;
        }
    }




}