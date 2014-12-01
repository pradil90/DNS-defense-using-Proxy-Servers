package securityproxy;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.lang.Thread.State;
import java.net.Socket;
import java.net.UnknownHostException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Timestamp;
import java.util.Arrays;
import java.util.Date;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;
import java.util.Random;
import java.util.Set;
import java.util.StringTokenizer;


/*
 * Class:clientthreadhandler implements the TODO for threads created in Client PC
 * 
 *Constructor:clientthreadhandler(String Host);
 *Methods:dataStrorage(String keyValue);
 * 
 */
public class SecurityproxyCACHE {
	
			private static String finalResult;
	@SuppressWarnings("rawtypes")
	
			private static HashMap hm = new HashMap();
			private static String finalIp;
		    private static int i=0;
		    
	 //	*****************Server port number************************* //
			static int port=7878;
	
	
	
	public SecurityproxyCACHE() {
		
		// TODO Auto-generated constructor stub
	}
	
	
	
	public static String queryBuilder(String ip){
		
			//Generating randam transaction ID--To generate TID for the query
			int TID=(tID(65535));
			String tID=Integer.toBinaryString(TID);
			
			/*
			 * Inputs:	the domain name specified by user
			 * returns:	Nil
			 * Purpose:	Saving the TID generated for the host
			 */
			
			setTID(ip, tID);
		
			//Attaching the tid with the DNS query
			String dnsQuery=ip+ "|"  +tID;
	

		
		System.out.println("[Forwarding the DNS query to ANS proxy server]");
	    
		    try
		    {
		        				//Initializing java socket to establish a contection to port <given above> of localhost//
		        				Socket proxysocket = new Socket("localhost", port);
		        
		        				//Initializing I/O streams to communicate with the remote proxy server
		        				DataOutputStream os = new DataOutputStream(proxysocket.getOutputStream());
		        				BufferedReader is = new BufferedReader(new InputStreamReader(proxysocket.getInputStream()));

		        
		        				//Initializing input buffer to recieve user input//
		        				BufferedReader clientrequest = new BufferedReader(new InputStreamReader(System.in));
		        
		        				while (true)
		        				{
		         
		        					//Sending client data to server//
		        					os.writeBytes(dnsQuery);
		        					os.writeByte('\n');
		        						System.out.println("[DNS response recieved]");
		           
		        					finalResult=is.readLine();
		        						System.out.println("[Printing the DNS respone recieved from the ANS proxy server]\n");
		           
		        						System.out.println("############################################################################\n");
		        						System.out.println(finalResult);
		        						System.out.println("\n##########################################################################\n");
		        						break;

		          
		        				}
		        				 //closing I/O streams and socket connections
		        				os.close();
		        				is.close();
		        				proxysocket.close();    
		    }//End of try block
					
		         catch (UnknownHostException e)
				{
					System.err.println("Unknown port:" + port);
				} catch (IOException e) 
				{
					System.err.println("Couldn't get I/O for the connection to port" + port);
				}//End of catch of Block
		    
		    
		    
		    if(tidChecker(finalResult)){
		    	System.out.println("[Detected security threat]\n");
		    	System.out.println("[Warning!!:Packet is being altered or misplaced by attacker]\n");
		    	System.out.println("Re-Querying....\n");
		    	i++;
		    	if(i<10){
		    	queryBuilder(ip);
		    	
		    	}else{
		    		finalIp="High Security risk Found!!!!Please try again sometime...";
		    	}
		    	
		    }
		    
		    	return finalIp;
		    
		
	}
	
	
	/* 
	 * Method	:tidChecker();
	 * Inputs	:Reponse from the remote proxy server
	 * returns	:True if secured/false on TID tampered.
	 * Purpose	:To check if the TID from the received package remains the same.
	 *  
	 */
	public static boolean tidChecker(String query){ 
		
		final String[] pide;
		pide= new String[5];
		boolean flag;


			StringTokenizer st = new StringTokenizer(query,"|");
			while (st.hasMoreTokens()) {
					for(int i=0;i<=2;i++){
							pide[i]=st.nextToken();
						}
					}
 
			//Storing the values to string.
			String ip=pide[2];
			String res=pide[1];
			String host=pide[0];

			System.out.println("[Scanning the recieved packet for security issues]");
 					if(hm.containsValue(res)){
 											System.out.println("No threats detected!!\n");
 											flag=false;
 						
 											//Check if its already present in the table if not make re-query
 											String historyIP=checkHistory(host,finalIp);
 						
 											if(ip.equalsIgnoreCase(historyIP)){
 																				//Setting the global variable with the resolved IP 
 																				finalIp=ip;
 																				System.out.println("testing checker 1:"+finalIp);
 																			}else{
 																				//returns the final IP address after comparing with five values//
 																				finalIp=querychecker(host);
 																			}
	  										}else{
 												flag=true;
 										}
 					return flag;
	}
	
	/* 
	 * Method	:querychecker();
	 * Inputs	:the host resolved and to check for any attack
	 * returns	:The IP address resolved for recursive query
	 * Purpose	:To check for new resolved Ip address. 
	 */
	
	
	public static String querychecker(String host){
		 
		 			String finalResult_1 = null;
		 			String finalResult_2 = null;
		 			String[] history;
		 			String val1,val2,val3,val4,val5;
		 			history = new String[5];
		 			int j=0;
			
		 
		 			do{
		 					//Generating randam transaction ID
		 					int TID=(tID(65535));
		 					String tID=Integer.toBinaryString(TID);
		
		 					//Saving the TID generated for the host
		 					setTID(host, tID);
			
		 					//Attaching the tid with the DNS query
		 					String dnsQuery=host+ "|"  +tID;
		

			
		 					System.out.println("[Forwarding the DNS query to ANS proxy server]");
		    
		 					try
		 						{
		 							//Initializing java socket to establish a contection to port 8888 of localhost//
		 							Socket proxysocket = new Socket("localhost", port);
			        

		 							DataOutputStream os = new DataOutputStream(proxysocket.getOutputStream());
		 							BufferedReader is = new BufferedReader(new InputStreamReader(proxysocket.getInputStream()));

			        
		 							//Initializing input buffer to recieve user input//
		 							BufferedReader clientrequest = new BufferedReader(new InputStreamReader(System.in));
			        
		 								while (true)
		 									{
		 										//Sending client data to server//
		 											os.writeBytes(dnsQuery);
		 											os.writeByte('\n');
			           
		 												finalResult_1=is.readLine();
		 												break;
		 									}//End of while loop
		 								os.close();
		 								is.close();
		 								proxysocket.close();     //closing the socket
		 						}//End of try block
						
		 						//IOexceptions capture loop//
		 						catch (UnknownHostException e)
		 							{
		 								System.err.println("Unknown port:" + port);
		 							} catch (IOException e) 
		 							{
		 								System.err.println("Couldn't get I/O for the connection to port" + port);
		 							}
			    
		 						//Removing the TID from the recived packet//
		 					finalResult_1=tidremover(finalResult_1);
			    
		 					history[j]=finalResult_1;
		    	
		 					System.out.println("this is by"+j+":"+finalResult_1);
		 					j++;
		 
			    
		 			}while(j<5);
			
		 
		 				val1=history[0];
		 				val2=history[1];
		 				val3=history[2];
		 				val4=history[3];
		 				val5=history[4];
				    if((val1.equalsIgnoreCase(val2)) || (val1.equalsIgnoreCase(val3)) || (val4.equalsIgnoreCase(val5))){
			    	finalResult_2=val1;
				    	}
			   
//				    		System.out.println("hi 2:"+finalResult_2);
				    		return finalResult_2;
		}
	
	
	/*
	 * Method	:tID(); 
	 * Inputs	:Given the max limit for tid generation.
	 * returns	:New 16-bit Tid generated.
	 * Purpose	:To generate 16-bit tID. 
	 * 
	 */
	
	 public static int tID(int inp){ 
	        
	        Random randomGenerator = new Random();
	        int randomInt = randomGenerator.nextInt(inp);
	        return  randomInt;
	       }
	 
	 	/*
		 * Method	:setTID(); 
		 * Inputs	:Given the Dname and tID generated.
		 * returns	:Nil
		 * Purpose	:To store the tID and Dname which is used to check security issues in  the packet recieved from the remote proxy server.
		 * 
		 */
	 
	 @SuppressWarnings("unchecked")
	public static void setTID(String ip,String tid){  
	 
		 			hm.put(ip, tid);
		 
		 				// Get a set of the entries
		 				@SuppressWarnings("rawtypes")
		 					Set set = hm.entrySet();
		    
		    
		 				// Get an iterator
		 				@SuppressWarnings("rawtypes")
		 					Iterator i = set.iterator();
		    
		 				// Display elements
		 					while(i.hasNext()) {
		 						@SuppressWarnings("rawtypes")
		       
		 						Map.Entry me = (Map.Entry)i.next();
		 						System.out.println("[Attaching trasaction ID to the query]");
//		 						System.out.print(me.getKey() + ": ");
//		 						System.out.println(me.getValue());
		}
		 
	 }
	 
	
	 /*
	  * Method	:checkHistory(); 
	  * Inputs	:Given the Dname and tID generated.
	  * returns	:The IP address fro the history database
	  * Purpose	:To check the history for the IP address correctness if not found the Dname query is selected for SRQ scheme.
	  * 
	  */
	 
	 
	 
	 public static String checkHistory(String host,String IP){ 
	
		 	String DBip = null;
		 						
		 						try{
		 								Connection myConn=DriverManager.getConnection("jdbc:mysql://localhost:3306/historyDB","root","");
		 
		 								PreparedStatement preparedStmt= null;
		 								String sqlQuery1 = "SELECT IP FROM history WHERE Dname='"+host+"';";
		 								preparedStmt = myConn.prepareStatement(sqlQuery1);
		 								ResultSet rs= preparedStmt.executeQuery(sqlQuery1);
		 									
		 									while (rs.next()) {
		 														DBip= rs.getString("IP");
				
		 														}
		 											if(DBip==null){
		 													DBip="Not found";
		 															}
		 											System.out.println(DBip);
		 											myConn.close();
		 						}catch(Exception exc){//END of try block
		 							exc.printStackTrace();
		 						}
		 	return DBip;
	}//End of CheckHistory Method
	 
	 /*
	  * Method	:tidremover(); 
	  * Inputs	:Given the Packet string recived from the remote server
	  * returns	:Ip address from the packet
	  * Purpose	:To fetch the IP address from the packet.
	  * 
	  */
	
	 public static String tidremover(String query){ 
			
			String[] pide;
			pide= new String[5];
			boolean flag;
			
			
			 StringTokenizer st = new StringTokenizer(query,"|");
		     while (st.hasMoreTokens()) {
		    	 for(int i=0;i<=2;i++){

		         pide[i]=st.nextToken();
		    	 }
		     }

		     String ip=pide[2];
		     String res=pide[1];
		     String host=pide[0];
 
		    
			return ip;
		}
		
	 
}
