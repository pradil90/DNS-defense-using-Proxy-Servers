package securityproxy;


import java.io.BufferedOutputStream;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Inet4Address;
import java.net.InetAddress;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;
import java.util.Random;
import java.util.Set;
import java.util.StringTokenizer;



	public class ConnectionHandler implements Runnable {
	
		private static int vulnerabilityLevel;
	
					ConnectionHandler(int vulnerabilityLevel){
						ConnectionHandler.vulnerabilityLevel=vulnerabilityLevel;
								}
	
					int x=0;
					String tid3;
					private Socket connection;
					@SuppressWarnings("rawtypes")
					static HashMap hm = new HashMap();

					//Get a set of the entries
					@SuppressWarnings("rawtypes")
					static Set set = hm.entrySet();


					// Get an iterator
					@SuppressWarnings("rawtypes")
					static Iterator i = set.iterator();
	
					String storedTID;
	
	public ConnectionHandler (Socket connection){
		this.connection = connection;
		
	}


	public void run(){
								try{

										// Standard Java way of doing input and output 
										BufferedReader is = new BufferedReader(new InputStreamReader( connection.getInputStream() ));                                 
										PrintWriter os = new PrintWriter(new BufferedOutputStream(connection.getOutputStream(), 1024), false);
										String inputLine;        

											while ((inputLine = is.readLine()) != null){
											
												if (inputLine.equals("QUIT"))
													break;
												System.out.println("[Recieved DNS query]");
												storedTID=inputLine;   
   
   
												String domain=queryfetcher(storedTID);
												tidattacher();

												System.out.println(domain);

												String xy="";
												if(hm.containsKey(domain)){
													xy=(String) hm.get(domain);
												}else{
													xy="IP address NOT found!!";
												}
												String tid1=(String)hm.get(domain);
												String queryIP=hostresolve(domain);
												//System.out.println("Printing resolved:"+queryIP);
												System.out.println("[Resolving the host]");
												tid3=attacker(tid1);
												System.out.println("[Generating respose.....]");
												os.println(domain + "|" + tid3 + "|" + queryIP + "\r");
												os.flush();
											}//End of While Loop
  
											System.out.println("[Response sent Successfully]\n\n");
											connection.close();

								} catch (IOException e) {//End of try block
														System.out.println("Accept failed: " + 8888 + ", " + e);
														System.exit(1);
								}//End of catch block

		}//End of run method




	@SuppressWarnings("unchecked")
	public static String queryfetcher(String query){ 
	
						System.out.println("[Fetching DNS query and TID from the recieved packet]");
						String[] pide;
						pide= new String[5];
	
						StringTokenizer st = new StringTokenizer(query,"|");
						while (st.hasMoreTokens()) {
												for(int i=0;i<=1;i++){

													pide[i]=st.nextToken();
												}
							}//End of While  loop
     
						String res=pide[1];
						String host=pide[0];
						// Put elements to the map
						hm.put(host, new String(res));
						return host;
		}//End of queryfetcher method




	public static void tidattacher(){
	
			// Display elements
				while(i.hasNext()) {
					@SuppressWarnings("rawtypes")
					Map.Entry me = (Map.Entry)i.next();
					System.out.print(me.getKey() + ": ");
					System.out.println(me.getValue());
				}
		}//End of tidattacher method.
	

	public static String hostresolve(String hosts){
	
	
				InetAddress ina = null;
									try {

											String host=hosts;
											int i=0;
											
											ina = InetAddress.getByName(hosts);

									} catch (UnknownHostException e) {
	
										e.printStackTrace();
									}
									String rawIP=ina.getHostAddress();
									System.out.println(rawIP); 
	
									return rawIP;
	}//End of hostresolve Method


	public static String attacker(String real){
	

		String tid="";
		Random randomGenerator = new Random();
		int randomInt = randomGenerator.nextInt(10);
    
		if(vulnerabilityLevel==5){
    	
			System.out.println("[Risk Level set to Medium]");
    
    		if(randomInt<3){
       			tid=real;
    						}else{
    								tid="0000000111110101";
    								}
							}else if(vulnerabilityLevel==10){
								System.out.println("[Risk Level set to HIGH]");
								if(randomInt<5){
									tid="0000000111110101";
        								}else{
        									tid="0000000111110101";
        									}
									}else{
											System.out.println("[Risk Level set to Low]");
												tid=real;
									}
			return  tid;
		}//End of attacker method

	
	}//End of ConnectionHandler class












