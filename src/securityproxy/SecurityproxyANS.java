package securityproxy;

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Scanner;

/*
 * Class:SecurityproxyANS.java
 * Purpose:Security proxy remote server 
 * 
 */

public class SecurityproxyANS {
	
								//	*****************Server port number************************* //
														static int port=7878;
	
	
	
				protected static ServerSocket serverSocket=null;
				public static void main(String args[]) throws IOException{
																		
		
								Socket clientSocket=null;
								String inputLine;
								int p=5;
        
									System.out.println("Enter the network risk level:");
									System.out.println("Options:HIGH - 10 , Medium - 5 , Low - 0");
									Scanner in=new Scanner(System.in);
									int vulnerabilityLevel=in.nextInt();
										ConnectionHandler handler=new ConnectionHandler(vulnerabilityLevel);
        
										try
											{
											serverSocket=new ServerSocket(port);
											System.out.println("ANS Security proxy server listening on " + port);
											}//End of try block
											catch(IOException e)
												{
													System.out.println("Could not run" +port+ ","+e);
													return;
												}
        
										while(true){
											//ConnectionHandler handler=null;
													try{
														Socket connection=serverSocket.accept();
														handler=new ConnectionHandler(connection);
														new Thread(handler).start();
													}
													catch(IOException e1)
													{
														System.out.println("Accept Failed" +port+ ","+e1);
														return;
													}
 
										}//End of While loop


				}//End of main class
	}//End of securityproxyANS class
