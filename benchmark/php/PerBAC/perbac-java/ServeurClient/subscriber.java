
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.InetAddress;
import java.net.ServerSocket;
import java.net.Socket;
import java.net.UnknownHostException;
import java.io.PrintWriter;
import java.io.BufferedWriter;
import java.io.FileWriter;

public class subscriber {

    public static void main(String[] args) {

        ServerSocket socketserver;
        Socket socketduserveur;
        BufferedReader in;
        PrintWriter out;

        try {

            socketserver = new ServerSocket(2009);
            socketduserveur = socketserver.accept();

            in = new BufferedReader(new InputStreamReader(socketduserveur.getInputStream()));
            String message_distant = in.readLine();
            BufferedWriter sortie = new BufferedWriter(new FileWriter("serveurparking.txt", true));
            sortie.newLine();
            sortie.write(message_distant);
            System.out.println(message_distant);
            sortie.close();
            socketserver.close();
            socketduserveur.close();

        } catch (IOException e) {
            e.printStackTrace();
        }

    }
}
