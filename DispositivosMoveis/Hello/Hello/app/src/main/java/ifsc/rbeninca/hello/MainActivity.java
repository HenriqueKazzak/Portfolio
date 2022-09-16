package ifsc.rbeninca.hello;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {
    int i;
    TextView t;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        t = findViewById(R.id.textView);
        t.setText("Ola Mundo");

    }
    @Override
    protected void onStart(){

    }

    public void ContaClick(View v){
        i++;
        t.setText(Integer.toString(i));
    }
}