<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
<link href="style.css" rel="stylesheet"
	type="text/css" />
</head>
<body>
<%
	if (!(session.getAttribute("flag") == "true")) {
		RequestDispatcher rd = request
				.getRequestDispatcher("/login.jsp");

		out
				.println("<center><font color='red'>Please login to continue</font></center>");
		rd.include(request, response);

		return;

	}
%>

<font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Welcome, <b><%=session.getAttribute("userName") %></b>  ! </br></br>

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<b><a href="startup.jsp" target="mainFrame">My User-Home</a></br></br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<b><a href="modification.jsp" target="mainFrame">User Modification</a></br></br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="search.jsp" target="mainFrame">Book Ticket</a> </br></br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="Logout">Logout</a> </br></br></b>
		</font>
		

</body>
</html>