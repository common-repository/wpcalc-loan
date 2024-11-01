function displaysNumbers(a,b,c,d){
	a=Math.round(a*Math.pow(10,b))/Math.pow(10,b);e=a+'';
	f=e.split('.');
	if(!f[0]){
		f[0]='0';
	}
	if(!f[1]){
		f[1]='';
	}
	if(f[1].length<b){
		g=f[1];
		for(i=f[1].length+1;i<=b;i++){
			g+='0';
		}
		f[1]=g;
	}
	if(d!=''&&f[0].length>3){
		h=f[0];
		f[0]='';
		for(j=3;j<h.length;j+=3){
			i=h.slice(h.length-j,h.length-j+3);
			f[0]=d+i+f[0]+'';
		}
		j=h.substr(0,(h.length%3==0)?3:(h.length%3));
		f[0]=j+f[0];
	}
	c=(b<=0)?'':c;
	return f[0]+c+f[1];
}

function roundingNumbers(value,precision){
	var val=Math.round(value*Math.pow(10,precision));
	val=val<0?"":val.toString();
	val=val.substring(0,val.length-precision)+"."+val.substring(val.length-precision,val.length);return val;
}

function considerResult(){
	var singleFee=0;
	var monthlyFee=0;
	var yearPay=0;
	var Pay=0;
	var aPay=0;
	var ePr=0;
	var minV;
	var year;
	var balance,interest,monthPay;
	var summBalance=0,interestOnLoan=0,SummPayment=0;
	a=Number(document.forms.mainform["credit"].value.replace(/\s/g, '',",","."));
	textfirstpayment = document.forms.mainform["textfirstpayment"].value;
	textmonthlypayment = document.forms.mainform["textmonthlypayment"].value;
	proc = document.forms.mainform["nachisl"].value;
	if (proc == 2){
		sp=Number(document.forms.mainform["percent"].value.replace(",","."));
		p=sp*12;
	} 
	else {
		p=Number(document.forms.mainform["percent"].value.replace(",",".")); 
	} 
	srok = document.forms.mainform["vremya"].value;
	if(srok == 2){
		ss=Number(document.forms.mainform["term"].value.replace(",","."));
		t=ss*12;
	} 
	else {
		t=Number(document.forms.mainform["term"].value.replace(",","."));
	}
	credit=Number(document.forms.mainform["credit"].value.replace(/\s/g, '',",","."));
	switch(document.forms.mainform["Shema"].value){
		case"classic":document.all("pay_header").innerText=textfirstpayment;
		break;
		case"annuitet":document.all("pay_header").innerText=textmonthlypayment;
		break;
		default:document.all("pay_header").innerText="";
	}
	switch(document.forms.mainform["Shema"].value){
		case"classic":monthPay=a/t+a*p/1200;
		break;
		case"annuitet":monthPay=a*p/1200/(1-Math.pow(1+p/1200,-t));
		break;
	}
	for(i=1;i<=3;i++){
		Pay=Number(document.forms.mainform["pr"+i+""].value.replace(",","."))*a/100;
		minV=Number(document.forms.mainform["com"+i+""].value.replace(",","."));
		if(minV&&Pay<minV)Pay=minV;
		if(i==1)singleFee=singleFee+Pay;
		if(i==2)monthlyFee=monthlyFee+Pay;
		if(i==3)yearPay=yearPay+Pay;
	}
	balance=Number(roundingNumbers(a/t,2));
	z=Number(roundingNumbers(a*p/1200/(1-Math.pow(1+p/1200,-t)),2));
	for(i=1;i<t;i++){
		switch(document.forms.mainform["Shema"].value){
			case"classic":interest=Number(roundingNumbers(a*p/1200,2));
			z=Number(roundingNumbers(balance+interest,2));
			a=a-balance;
			break;
			case"annuitet":interest=Number(roundingNumbers(a*p/1200,2));
			balance=Number(roundingNumbers(z-interest,2));
			a=a-balance;
			break;
			default:
			interest="";
		}
		interestOnLoan+=interest;
		summBalance+=balance;
		SummPayment+=z;
	}
	balance=a;
	interest=Number(roundingNumbers(balance*p/1200,2));
	z=Number(roundingNumbers(balance+interest,2));
	interestOnLoan+=interest;
	summBalance+=balance;
	SummPayment+=z;
	year=(Math.floor(t/12)==(t/12))?t/12:Math.floor(t/12);
	aPay=singleFee+(monthlyFee+monthPay)*t+yearPay*year;
	overpayment=SummPayment-credit+singleFee+monthlyFee*t+yearPay*year;
	summAll=SummPayment+singleFee+monthlyFee*t+yearPay*year;
	summMonthlyFee=monthlyFee*t;
	summEearFee=yearPay*year;
	overpaymentPercentage=overpayment/credit*100;
	document.getElementById("monthPay").innerHTML=displaysNumbers(monthPay,2,"."," ");
	document.getElementById("monthlyFee").innerHTML=displaysNumbers(monthlyFee,2,"."," ");
	document.getElementById("allPay").innerHTML=displaysNumbers(summAll,2,"."," "); 
	document.getElementById("overpayment").innerHTML=displaysNumbers(overpayment,2,"."," ");
	document.getElementById("interestOnLoan").innerHTML=displaysNumbers(interestOnLoan,2,"."," ");
	document.getElementById("singleFee").innerHTML=displaysNumbers(singleFee,2,"."," ");
	document.getElementById("summMonthlyFee").innerHTML=displaysNumbers(summMonthlyFee,2,"."," ");
	document.getElementById("summEearFee").innerHTML=displaysNumbers(summEearFee,2,"."," ");
	document.getElementById("overpaymentPercentage").innerHTML=displaysNumbers(overpaymentPercentage,1,"."," ");
}  

function buildSchedule(){
	credit=Number(document.forms.mainform["credit"].value.replace(/\s/g, '',",","."));
	proc = document.forms.mainform["nachisl"].value;
	if (proc == 2){
		sp=Number(document.forms.mainform["percent"].value.replace(",","."));
		percent=sp*12;
	}
	else {
		percent=Number(document.forms.mainform["percent"].value.replace(",","."));
	} 
	srok = document.forms.mainform["vremya"].value.replace(",",".");
	if(srok == 2){
		ss=Number(document.forms.mainform["term"].value.replace(",","."));
		term=ss*12;
	}
	else {
		term=Number(document.forms.mainform["term"].value.replace(",","."));
	} 
	var balance,interest,payment;
	var summBalance=0,SummInterest=0,SummPayment=0;
	textPeriod = document.forms.mainform["textPeriod"].value;
	textPayment = document.forms.mainform["textPayment"].value;
	textPrincipal = document.forms.mainform["textPrincipal"].value;
	textInterest = document.forms.mainform["textInterest"].value;
	textBalance = document.forms.mainform["textBalance"].value;
	textTotal = document.forms.mainform["textTotal"].value;
	textmonths = document.forms.mainform["textmonths"].value;
	textyear = document.forms.mainform["textyear"].value;
    text="";
	text=text+"<table class='table-grafiks'><thead><tr><th>"+textPeriod+"</th><th>"+textPayment+"</th><th>"+textPrincipal+"</th><th>"+textInterest+"</th><th>"+textBalance+"</th></tr></thead><tbody>";
	balance=Number(roundingNumbers(credit/term,2));
	payment=Number(roundingNumbers(credit*percent/1200/(1-Math.pow(1+percent/1200,-term)),2));
	var tyear=0;
	for(i=1;i<=term;i++){
		switch(document.forms.mainform["Shema"].value){
			case"classic":interest=Number(roundingNumbers(credit*percent/1200,2));
			payment=Number(roundingNumbers(balance+interest,2));
			credit=credit-balance;
			break;
			case"annuitet":interest=Number(roundingNumbers(credit*percent/1200,2));
			balance=Number(roundingNumbers(payment-interest,2));
			credit=credit-balance;
			break;
			default:interest="";
		}
		if((i-1)%12==0){
			tyear++;
			text=text+"<tr><td colspan=5><b>"+tyear+textyear+"</b></nobr></td></tr>";
		}
		text=text+"<tr><td><nobr>"+i+textmonths+"</nobr></td><td><b>"+roundingNumbers(payment,2)+"</b></td><td>"+roundingNumbers(balance,2)+"</td><td>"+roundingNumbers(interest,2)+"</td><td>"+roundingNumbers(credit,2)+"</td></tr>";
		SummInterest+=interest;
		summBalance+=balance;
		SummPayment+=payment;
	}
	text=text+"<tfoot><tr><td><b>"+textTotal+"</b></td><td><b>"+roundingNumbers(SummPayment,2)+"</b></td><td><b>"+roundingNumbers(summBalance,2)+"</b></td><td><b>"+roundingNumbers(SummInterest,2)+"</b></td><td></td></tr></tfoot>";
	text=text+"</tbody></table>";
	document.all.table_data.innerHTML="";
	document.all.table_data.innerHTML=text;
} 

function displayplat(){
	document.getElementById("plateg").style.display="";
	document.getElementById("grafic").style.display=""; 
}

function atoprint() {
	var textprint = document.forms.mainform["textprint"].value;
	var atext = document.getElementById('plateg').innerHTML; 
	var btext = document.getElementById('table_data').innerHTML;
	var captext = "Wpcalc Loan";//window.document.title;
	var alink = window.document.location;
	var prwin = open('');
	prwin.document.open();
	prwin.document.writeln('<html><head><title>For Print<\/title><link rel="stylesheet" href="'+wpc_loan_print+'"><\/head><body><div onselectstart="return false;" oncopy="return false;">');
	prwin.document.writeln('<div style="margin-bottom:5px;"><a href="javascript://" onclick="window.print();">'+textprint+'<\/a> <\/div><hr>');	
	prwin.document.writeln(atext);
	prwin.document.writeln(btext);
	prwin.document.writeln('<\/div><\/body><\/html>');
} 
function displayprint(){
	document.getElementById("print1").style.display="";
	document.getElementById("print2").style.display=""; 
}