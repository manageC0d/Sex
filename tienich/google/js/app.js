$(document).ready(function(){
	
	app_name = ""; //search engine name
	loc = "en"; //locale
	freebase_key = ""; //your Freebase API key
	window.squery = ""; //query prediction
	query = ""; //current search query
	point = [0,0]; //point on freebase google map
	got_base = 0; //if found freebase info
	page = 0; //results page
	lw = 0; //load wait > 0 to prevent multiple pages load while scrolling
	fs = 0; //if current search query is final
	tab = "web"; //current tab
	ps = setTimeout("",1); //timer to pre-load results for predicted query
	v = []; //used to save the visibility state of an element with given id
	cq = setInterval("",3600000); //to check if the results are for the current query
		
	$("#q").googleSuggest({service: "web"});
	$("#q").on("autocompleteselect",function(){setTimeout("$('#q').blur(); set_query($('#q').val()); $('#sug').val($('#q').val()); fs=1; search(0); page=0;",10);});
	
	$("#q").val(""); //#q is the search box in results
	$("#qs").val(""); //#qs is the search box in homepage
	
	$(".sbtn").click(function(){ //.sbtn is the search button
		$("#sug").val($("#q").val()); //#sug is the prediction textbox
		$(".ui-widget-content").hide(); //hide autocomplete menu
		$("#q").blur();
		$("#res").css({"opacity":"0.3"}); //#res is the results div
		set_query($("#q").val());
		lw = 0;
		fs = 1;
		search(0);
	});
	
	$(".top_logo").click(function(){
		$("#top").hide();
		clear();
		$(".main").show();
		$(".tabs").hide();
		$("#footer").show();
		$("#qs").val("");
		$("#qs").focus();
		tab = "web";
	});
	
	$(document).mouseup(function (e){
		var container = $(".ilink");
		if(!container.is(e.target) && container.has(e.target).length === 0){
			$(".cached").hide();
			v = [];
		}
	});
	
	$("#qs").bind('keyup', function(e){
		$(".main").hide();
		$(".tabs").show();
		$("#footer").hide();
		$("#top").show();
		$("#q").focus();
		$("#q").val($("#qs").val());
		set_query($("#qs").val());
		init_predict();
	});
	
	$("#q").bind('keyup keypress cut copy paste', function(e){
		if(e.keyCode==13){ //if enter pressed
			$("#sug").val($("#q").val());
			$(".ui-widget-content").hide();
			$("#q").blur();
			$("#res").css({"opacity":"0.3"});
			set_query($("#q").val());
			fs = 1;
			search(0);
		}
		if($("#q").val()==""){
			$("#x").fadeOut();
			clearTimeout(ps);
			clear();
		}else{
			$("#x").fadeIn();
		}
	});
	
	$("#q").blur(function(){
		$("#delete").css({"border":"1px solid #D8D8D8", "border-left":"none"});
	});
	
	$("#q").focus(function(){
		$("#delete").css({"border":"1px solid #81BEF7", "border-left":"none"});
	});
	
	$("#q").select(function(){
		fs = 0;
		$("#sug").val("");
	});
	
	$("#x").click(function(){
		clear();
		$("#q").focus();
		$(this).hide();
    });
	
	$(".tab").click(function(){
		$(".tab").removeClass("tsel");
		$(this).addClass("tsel");
		$("#sug").val($("#q").val());
	});
	
	$("#web").click(function(){
		choose_tab("web");
	});
	
	$("#images").click(function(){
		choose_tab("images");
	});
	
	$("#videos").click(function(){
		choose_tab("videos");
	});
	
	$("#news").click(function(){
		choose_tab("news");
	});
	
	$("#blogs").click(function(){
		choose_tab("blogs");
	});
	
	$(window).scroll(function(){ //load on scroll
		if((tab=="images"||tab=="videos") && $(window).scrollTop() >= $(document).height() - $(window).height() - 300 && lw==0){
			search(1);
		}
	});
	
	zoom = 4; //default google maps zoom
	
	$("#qs").focus();
	
	if(get_hash().indexOf("q=")>=0){ //if query is set in URL fragment
		$('#q').blur();
		$('#qs').blur();
		set_query(get_hash().replace("q=",""));
		$('#sug').val(get_hash().replace("q=",""));
		$('#q').val(get_hash().replace("q=",""))
		$("#top").show();
		$(".tabs").show();
		$("#x").show();
		get_page(1);
	}else{
		$(".main").show();
		$("#footer").show();
		$('#qs').focus();
	}
	
});

function get_page(p){
	pstart = p;
	$('html, body').animate({ scrollTop: 0 }, 0);
	$("#res").css({"opacity":"0.3"});
	search(1);
}

function srch(){
	window.location = "http://www.pretraga.me/#q="+$("#q").val();
}

function lucky(){
	window.location = "http://www.google.com/search?hl=en&source=hp&btnI&q="+$("#q").val();
}

function choose_tab(id){
	tab = id;
	fs = 1;
	page = 0;
	got_base = 0;
	$("#res").css({"opacity":"0.3"});
	search(1);
}

function escapeHtml(text){ //to prevent XSS attacks
  return text
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
}

var decodeEntities = (function(){ //to decode html special chars
  var element = document.createElement('div');

  function decodeHTMLEntities (str) {
    if(str && typeof str === 'string'){
      element.innerHTML = str;
      str = element.textContent;
      element.textContent = '';
    }

    return str;
  }
  return decodeHTMLEntities;
})();

function toggle(id){ //toggle visibility of an element
	if(!v[id]){
		$(id).show();
		v[id] = 1;
	}else{
		$(id).hide();
		v[id] = 0;
	}
}

function get_hash(){ //get the current hash of the search page
	return decodeURIComponent(window.location.hash.substring(1));
}

function set_query(q){ //set the search query
	page = 0;
	got_base = 0;
	query = decodeEntities(escapeHtml(q));
	if(query!=""){
		document.title = query + " - " + app_name;
		window.location.replace("#q=" + encodeURIComponent(query));
	}else{
		document.title = app_name;
		window.location.replace("#");
		$("#sug").val("");
	}
}

function init_predict(){
	$.ajax({
      url: 'https://clients1.google.com/complete/search',
      dataType: 'jsonp',
      data: {
        q: query,
        nolabels: 't',
        client: 'psy',
        ds: ''
      },
      success: function(data) {
		uquery = data[1][0].toString();
		tquery = uquery.split(",0");
		window.squery = tquery[0];
		if(window.squery!="undefined" && window.squery!=query){
			window.squery = window.squery.replace('<b>','');
			window.squery = window.squery.replace('</b>','');
			window.squery = window.squery.replace('\u003cb\u003e','');
			set_query(window.squery);
			if(window.squery.indexOf($("#q").val())>-1){
				$("#sug").val(query);
				if($("#q").val()!=""){
					ps = setTimeout("fs=0; set_query(window.squery); get_page(1);",100);
				}
			}else{
				$("#sug").val("");
			}
		}
		else if(window.squery=="undefined"){
			set_query("");
		}
        response($.map(data[1], function(item){
          return { value: $("<span>").html(item[0]).text() };
        }).slice(0, 4));
      }
    });
}

function clear(){ //clear when search box is empty
	fs = 0;
	page = 0;
	start = 0;
	got_base = 0;
	tab = "web";
	$(".tab").removeClass("tsel");
	$("#web").addClass("tsel");
	$("#q").val("");
	$("#sug").val("");
	hide_answer();
	$("#pages").html("");
	$("#res").html("");
	$("#res").hide();
	$("#freebase").html("");
	$("#freebase").hide();
	$("#stats").hide();
	set_query("");
	window.squery = "";
	window.location.replace("#");
	document.title = app_name;
}

function show_answer(){ //show special answer on top of results
	$("#res").prepend('<div id="answer shadow"></div>');
	$("#res").css({"margin-top":"50px"});
}

function hide_answer(){ //hide special answer
	$("#answer").hide();
	$("#res").html($("#res").html().replace('<div id="answer shadow"></div>',''));
	$("#res").css({"margin-top":"20px"});
}

function search(c){ //main search function
	if(c==0){
		if($("#res").html()!="" && $("#query").html()==query && $("#sug").val()==query){
			$("#res").css({"opacity":"1"});
			return;
		}
		$("#res").css({"opacity":"0.3"}); //fadeOut results
		lw = 0;
	}
	
	clearTimeout(ps);
	hide_answer();
	
	if(tab=="web"){
		if(page==0){
			pstart = 0;
			$("#res").removeClass("fwidth");
			$("#pages").html("");
			
			if(!got_base) freebase_search();
			if(query.indexOf("weather")>-1){ //get weather answer
				show_answer();
				var wloc = query.replace("weather in","");
				wloc = wloc.replace("weather at","");
				wloc = wloc.replace("weather of","");
				wloc = wloc.replace("weather on","");
				wloc = wloc.replace("weather","");
				$("#answer").load("apis/weather.php?c="+encodeURIComponent(wloc),function(d){
					if(d!="") $("#answer").show();
					else{
						hide_answer();
					}
				});
			}
		}
		web_search(page);
	}else if(tab=="images"){
		$("#pages").html("");
		images_search(page);
	}else if(tab=="videos"){
		$("#pages").html("");
		videos_search(page);
	}else if(tab=="news"){
		news_search(page);
	}else if(tab=="blogs"){
		blogs_search(page);
	}
}

function web_search(start){ //google web search function
	if(tab!="web") return;
	lw++;
	var cw = lw; //current result page count (to prevent an issue when changing tab)
	clearInterval(cq);
	cq = setInterval("if($('#q').val()!='"+query+"' && fs){ set_query($('#q').val()); $('#res').html(''); search(0); }",700); //to check the current query
	$("#q").googleSuggest({service: "web"});
	gurl = "https://www.googleapis.com/customsearch/v1element?key=AIzaSyCVAXiUzRYsML1Pv6RwSG1gunmMikTzQqY&num=10&prettyPrint=false&source=gcsc&gss=.com&sig=ee93f9aae9c9e9dba5eea831d506e69a&cx=partner-pub-8993703457585266%3A4862972284&googlehost=www.google.com&hl="+loc+"&q="+query;
	if(start>0){
		gurl = gurl + "&start=" + start + 1;
	}
	$.ajax({
		type: "GET",
		url: gurl,
		dataType:"jsonp",
		success: function(response){
			if(response.results){
				$("#pages").html("");
				cnt = 0;
				$.each(response.cursor.pages, function(index,pitem){
					cnt++;
					if(cnt<10){
						if(parseInt(pitem.label)==response.cursor.currentPageIndex+1)
							$("#pages").append("<span onclick='page = "+pitem.label+"-1; get_page("+parseInt(pitem.label)+");'><b>"+pitem.label+"</b></span> ");
						else
							$("#pages").append("<span onclick='page = "+pitem.label+"-1; get_page("+parseInt(pitem.label)+");'>"+pitem.label+"</span> ");
					}
				});
				if(page<8) $("#pages").append(' &nbsp;<span id="next" onclick="page++; get_page(page+1);">Next></span>');
				if(page>0) $("#pages").prepend('<span id="previous" onclick="page--; get_page(page-1);">< Backward</span> &nbsp;');
				cnt = 0;
				$("#res").html("");
				$("#res").removeClass("fwidth");

				$.each(response.results, function(index, item){
					cnt++;
					var r_url = decodeURIComponent(item.url);
					if(item.richSnippet && (r_url.indexOf("wikipedia.org")>-1||r_url.indexOf("youtube.com/watch?v=")>-1||r_url.indexOf("play.google.com/store/apps/details?id=")>-1)){
						if(item.richSnippet.cseThumbnail)
							var tb_img = "<img class='thumb' src='"+item.richSnippet.cseThumbnail.src+"'/>";
						else{
							var ytid = get_ytid(r_url);
							if(ytid!=""){
								var tb_img = "<img class='thumb' src='https://i.ytimg.com/vi/"+ytid+"/default.jpg'/>";
							}else{
								var tb_img = "";
							}
						}
					}else{
						var tb_img = "";
					}
					$("#res").append("<div class='rbox clearfix'><a class='rl' href='"+decodeURIComponent(item.url)+"' target='blank'>"+item.title+"</a><br/>"+tb_img+"<div class='g'>"+decodeURIComponent(item.formattedUrl)+" <div class='ilink' onclick='$("+'".cached"'+").hide(); toggle("+'"#i'+cnt+'"'+");'>&#9662; <div class='cached shadow' id='i"+cnt+"'><a href='"+item.cacheUrl+"' target='blank'>Cached</a></div></div></div><div class='snipet'>"+item.content+"</div></div><br/>");
				});
				if(start==0 && response.cursor.resultCount!='0' && cw==lw){
					$("#res").show();
					$("#query").html(query);
					var rcount = parseInt(replaceAll(",","",response.cursor.resultCount));
					$("#count").html(number_format(rcount));
					$("#speed").html(response.cursor.searchResultTime);
					$("#stats").show();
					if(rcount>=1000000||$("#res").html().indexOf("www.imdb.com/title/tt")>-1||$("#res").html().indexOf("wikipedia.org/wiki/")>-1) $("#freebase").show();
				}
				lw = 0;
			}else $("#next").hide();
			$("#res").css({"opacity":"1"});
		}
	});
}

function images_search(start){ //google images search function
	if(tab!="images") return;
	lw++;
	var cw = lw;
	clearInterval(cq);
	cq = setInterval("if($('#q').val()!='"+query+"' && fs){ set_query($('#q').val()); $('#res').html(''); search(0); }",700);
	$("#q").googleSuggest({service: "images"});
	gurl = "https://www.googleapis.com/customsearch/v1element?key=AIzaSyCVAXiUzRYsML1Pv6RwSG1gunmMikTzQqY&num=10&prettyPrint=false&source=gcsc&gss=.com&sig=ee93f9aae9c9e9dba5eea831d506e69a&searchtype=image&cx=partner-pub-8993703457585266%3A4862972284&googlehost=www.google.com&hl="+loc+"&q="+query;
	if(start>0){
		gurl = gurl + "&start=" + start + 1;
	}
	$.ajax({
		type: "GET",
		url: gurl,
		dataType:"jsonp",
		success: function(response){
			if(response.results){
				if(start==0){
					cnt = 0;
					$("#res").html("");
					$("#res").addClass("fwidth");
				}
				$.each(response.results, function(index, item){
					cnt++;
					$("#res").append("<div class='image'><a href='"+item.unescapedUrl+"' target='blank'><img src='"+item.tbUrl+"'></a></div>");
				});
				if(start==0 && response.cursor.resultCount!='0' && cw==lw){
					$("#res").show();
					$("#query").html(query);
					var rcount = replaceAll(",",".",response.cursor.resultCount);
					$("#count").html(rcount);
					$("#speed").html(response.cursor.searchResultTime);
					$("#stats").show();
					$("#freebase").html("");
					$("#freebase").hide();
				}
				lw = 0;
				if(cnt<100){ //load at least 100 images
					images_search(start+1);
				}
			}
			$("#res").css({"opacity":"1"});
			lw = 0;
			page++;
		}
	});
}

function videos_search(start){
	if(tab!="videos") return;
	lw++;
	var cw = lw;
	clearInterval(cq);
	cq = setInterval("if($('#q').val()!='"+query+"' && fs){ set_query($('#q').val()); $('#res').html(''); search(0); }",700);
	$("#q").googleSuggest({service: "youtube"});
	gurl = "http://gdata.youtube.com/feeds/api/videos?alt=jsonc&v=2&lr=en&orderby=viewCount&max-results=20&hl=en&q="+query;
	gurl = gurl + "&start-index=" + 2*start + 1;
	$.ajax({
		type: "GET",
		url: gurl,
		dataType:"jsonp",
		success: function(response){
			ready = 1;
			if(response.data.items){
				page++;
				if(start==0){
					cnt = 0;
					$("#res").html("");
					$("#res").removeClass("fwidth");
				}
				$.each(response.data.items, function(index, item){
					var cdate = new Date().getTime()/1000;
					pdate = toTimestamp(item.uploaded);
					var diff = cdate-pdate;
					if(diff<0){
						diff = -diff;
					}
					date = timeago(diff);
					$("#res").append("<div class='svideo'><a href='http://www.youtube.com/watch?v="+item.id+"' target='blank'><img src='"+item.thumbnail.sqDefault+"'/></a><a href='http://www.youtube.com/watch?v="+item.id+"' target='blank' class='rl'>"+item.title+"</a><br/><a href='http://youtube.com/user/"+item.uploader+"'>"+item.uploader+"</a> - "+date+" - "+number_format(item.viewCount)+" views<br/>Duration: "+get_duration(item.duration)+"</div>");
				});
				if(start==0 && response.data.totalItems!='0'){
					$("#query").html(query);
					$("#count").html(number_format(response.data.totalItems));
					$("#speed").html('~0.2');
					$("#stats").show();
					$("#freebase").html("");
					$("#freebase").hide();
				}
				lw = 0;
			}
			$("#res").css({"opacity":"1"});
			lw = 0;
			page++;
		}
	});
}

function get_ytid(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    if (match&&match[7].length==11){
        return match[7];
    }else{
        return "";
    }
}

function news_search(start){
	if(tab!="news") return;
	lw++;
	var cw = lw;
	clearInterval(cq);
	cq = setInterval("if($('#q').val()!='"+query+"' && fs){ set_query($('#q').val()); $('#res').html(''); search(0); }",700);
	$("#q").googleSuggest({service: "news"});
	gurl = "https://ajax.googleapis.com/ajax/services/search/news?v=1.0&q="+query+"&hl="+loc;
	if(start>0){
		gurl = gurl + "&start=" + pstart;
	}
	$.ajax({
		type: "GET",
		url: gurl,
		dataType:"jsonp",
		success: function(response){
			ready = 1;
			if(response.responseData.results){
				var cdate = new Date().getTime()/1000;
				
				$("#pages").html("");
				cnt = 0;
				$.each(response.responseData.cursor.pages, function(index,pitem){
					cnt++;
					if(cnt<10){
						if(parseInt(pitem.label)==response.responseData.cursor.currentPageIndex+1){
							$("#pages").append("<span onclick='page = "+pitem.label+"-1; get_page("+pitem.start+");'><b>"+pitem.label+"</b></span> ");
							pstart = parseInt(pitem.start);
						}else
							$("#pages").append("<span onclick='page = "+pitem.label+"-1; get_page("+pitem.start+");'>"+pitem.label+"</span> ");
					}
				});
				if(page<parseInt(response.responseData.cursor.pages[response.responseData.cursor.pages.length-1].label)-1) $("#pages").append(' &nbsp;<span id="next" onclick="page++; get_page(pstart+4);">Next ></span>');
				if(start>0) $("#pages").prepend('<span id="previous" onclick="page--; get_page(pstart-4);">< Previous</span> &nbsp;');
				cnt = 0;
				$("#res").html("");
				$("#res").removeClass("fwidth");
				
				$.each(response.responseData.results, function(index, item){
					cnt++;
					var pdate = toTimestamp(item.publishedDate);
					var diff = cdate-pdate;
					if(diff<0){
						diff = -diff;
					}
					var date = timeago(diff);
					if(item.image){
						if(item.image.tbUrl)
							var tb_img = "<img class='thumb' src='"+item.image.tbUrl+"'/>";
						else
							var tb_img = "";
					}else{
						var tb_img = "";
					}
					$("#res").append("<div class='rbox clearfix'>"+tb_img+"<a href='"+decodeURIComponent(item.unescapedUrl)+"' target='blank' class='rl_sm'>"+item.title+"</a><br/><span class='g'>"+item.publisher+"</span> - <span class='gray'>"+date+"</span><br/>"+item.content+"<br/></div><br/>");
				});
				if(start==0 && response.responseData.cursor.estimatedResultCount!='0'){
					$("#query").html(query);
					var rcount = number_format(response.responseData.cursor.estimatedResultCount);
					$("#count").html(rcount);
					$("#speed").html('~0.2');
					$("#stats").show();
					$("#freebase").html("");
					$("#freebase").hide();
				}
			}
			$("#res").css({"opacity":"1"});
			lw = 0;
		}
	});
}

function blogs_search(start){
	if(tab!="blogs") return;
	lw++;
	var cw = lw;
	clearInterval(cq);
	cq = setInterval("if($('#q').val()!='"+query+"' && fs){ set_query($('#q').val()); $('#res').html(''); search(0); }",700);
	$("#q").googleSuggest({service: "news"});
	gurl = "https://ajax.googleapis.com/ajax/services/search/blogs?v=1.0&q="+query+"&hl="+loc;
	if(start>0){
		gurl = gurl + "&start=" + pstart;
	}
	$.ajax({
		type: "GET",
		url: gurl,
		dataType:"jsonp",
		success: function(response){
			ready = 1;
			if(response.responseData.results){
				
				$("#pages").html("");
				cnt = 0;
				$.each(response.responseData.cursor.pages, function(index,pitem){
					cnt++;
					if(cnt<10){
						if(parseInt(pitem.label)==response.responseData.cursor.currentPageIndex+1){
							$("#pages").append("<span onclick='page = "+pitem.label+"-1; get_page("+pitem.start+");'><b>"+pitem.label+"</b></span> ");
							pstart = parseInt(pitem.start);
						}else
							$("#pages").append("<span onclick='page = "+pitem.label+"-1; get_page("+pitem.start+");'>"+pitem.label+"</span> ");
					}
				});
				if(page<parseInt(response.responseData.cursor.pages[response.responseData.cursor.pages.length-1].label)-1) $("#pages").append(' &nbsp;<span id="next" onclick="page++; get_page(pstart+4);">Next ></span>');
				if(page>0) $("#pages").prepend('<span id="previous" onclick="page--; get_page(pstart-4);">< Previous</span> &nbsp;');
				cnt = 0;
				$("#res").html("");
				$("#res").removeClass("fwidth");
				
				$.each(response.responseData.results, function(index, item){
					cnt++;
					$("#res").append("<div class='rbox clearfix'><a href='"+decodeURIComponent(item.postUrl)+"' target='blank' class='rl'>"+item.title+"</a><br/><span class='g'>"+item.postUrl+"</span><br/>"+item.content+"<br/></div><br/>");
				});
				if(start==0 && response.responseData.cursor.estimatedResultCount!='0'){
					$("#query").html(query);
					$("#count").html(number_format(response.responseData.cursor.estimatedResultCount));
					$("#speed").html('~0.2');
					$("#stats").show();
					$("#freebase").html("");
					$("#freebase").hide();
				}
			}
			$("#res").css({"opacity":"1"});
			lw = 0;
		}
	});
}

function get_thumb(title){ //get an image for freebase result if not any
$.ajax({
	type: "GET",
	url: "http://ajax.googleapis.com/ajax/services/search/images?v=1.0&hl="+loc+"&q="+title+"&start=0",
	dataType:"jsonp",
	success: function(response){
		if(response.responseData.results){
			$(".fimg").attr("src", response.responseData.results[0].unescapedUrl);
		}else{
			$(".fimg").hide();
		}
	}
});
}

function freebase_search(){ //freebase search function
	$("#freebase").hide();
	$("#freebase").html("");
	point = [0,0];
	$.get("https://www.googleapis.com/freebase/v1/search?limit=10&scoring=entity&query="+query+"&key="+freebase_key+"&prefixed=true&output=(key%3A%2Fwikipedia%2Fen_title)&lang="+loc,function(data){
		if(data){
			if(!data.result) return;
		
			var res_count = data.result.length;
			
			var m_id = 0;
			var wiki_found = 0;
			
			for(var i=0;i<res_count;i++){
				var id = data.result[i].mid;
				var name = data.result[i].name;
				
				//search for an item with wikipedia article
				
				if(data.result[i].output["key:/wikipedia/en_title"]["/type/object/key"] && !wiki_found){
					var m_id = i;
					if(data.result[i].output["key:/wikipedia/en_title"]["/type/object/key"]){
						wiki_found = 1;
					}
				}
			}
			
			if(!wiki_found) return; //return if no wiki found
			
			if(!data.result[m_id]) return; //return if empty result
			
			var id = data.result[m_id].mid;
			var name = data.result[m_id].name;
			var wikipedia = data.result[m_id].output["key:/wikipedia/en_title"]["/type/object/key"][0].replace("/wikipedia/en_title/","http://en.wikipedia.org/");
			
			$.get("apis/freebase.php?id="+id, function(idata){
				if(got_base) return;
				got_base = 1;
				var info = "";
				if(idata){
					if(!idata.property) return;
					var is_person = 0, notable = "";
					
					var cnt = idata.property["/type/object/type"]["values"].length;
					for(var i=0;i<cnt;i++){
						if(idata.property["/type/object/type"]["values"][i]["text"]=="Person"){
							var is_person = 1;
							break;
						}
					}
					var info = "<div class='info title'><b>"+name+"</b></div>";
					if(idata.property["/common/topic/notable_for"]){
						var notable = idata.property["/common/topic/notable_for"]["values"][0]["text"];
						if(notable!=null)
						info += "<span class='info gray' style='padding-top:0;'>"+notable+"</span><br/>";
					}
					if(idata.property["/common/topic/image"]){
						var image = "https://usercontent.googleapis.com/freebase/v1/image" + idata.property["/common/topic/image"]["values"][0]["id"] + "?maxwidth=370&maxheight=330";
						info += "<img src='"+image+"' class='fimg' onerror='get_thumb("+encodeURIComponent(name)+");'/>";
					}else{
						info += "<img src='' class='fimg' onerror='$(this).hide();'/>";
					}
					if(idata.property["/common/topic/description"]){
						var description = idata.property["/common/topic/description"]["values"][0]["value"];
						var words = description.split(" ");
						var summary = "";
						for(var i=0;i<words.length && i<50;i++){
							summary += words[i] + " ";
						}
						more = "";
						if(i<words.length){
							for(;i<words.length;i++){
								more += words[i] + " ";
							}
							summary += "<span id='mlink'>... <a href='javascript:void(0);' onclick='$("+'"#more"'+").show(); $("+'"#mlink"'+").hide();'>More</a></span><span id='more'>"+more+"<a href='javascript:void(0);' onclick='$("+'"#mlink"'+").show(); $("+'"#more"'+").hide();'>Less</a></span>";
						}
						info += "<div class='info'>"+summary+"</div>";
					}
					
					
					if(idata.property["/film/film/trailers"]){
						var val = idata.property["/film/film/trailers"]["values"][0]["text"].replace("watch?v=","v/");
						if(val.indexOf("youtube")) info += "<iframe class='video' src='"+val+"'></iframe>";
					}
					if(idata.property["/film/film/initial_release_date"]){
						var val = idata.property["/film/film/initial_release_date"]["values"][0]["text"];
						info += "<span class='info'><b>Release date:</b> "+val+"</span>";
					}
					if(idata.property["/film/film/directed_by"]){
						var val = idata.property["/film/film/directed_by"]["values"][0]["text"];
						info += "<span class='info'><b>Directed by:</b> "+val+"</span>";
					}
					if(idata.property["/film/film/written_by"]){
						var val = idata.property["/film/film/written_by"]["values"][0]["text"];
						info += "<span class='info'><b>Written by:</b> "+val+"</span>";
					}
					if(idata.property["/film/film/music"]){
						var val = idata.property["/film/film/music"]["values"][0]["text"];
						info += "<span class='info'><b>Music by:</b> "+val+"</span>";
					}
					if(idata.property["/film/film/rating"]){
						var val = idata.property["/film/film/rating"]["values"][0]["text"];
						info += "<span class='info'><b>Content rating:</b> "+val+"</span>";
					}
					if(idata.property["/film/film/runtime"]){
						var val = idata.property["/film/film/runtime"]["values"][0]["property"]["/film/film_cut/runtime"]["values"][0]["text"].replace(".0","");
						info += "<span class='info'><b>Runtime:</b> "+val+" minutes</span>";
					}
					if(idata.property["/film/film/starring"]){
						var vals = "";
						var count = idata.property["/film/film/starring"]["values"].length;
						for(var i=0;i<count;i++){
							vals += idata.property["/film/film/starring"]["values"][i]["property"]["/film/performance/actor"]["values"][0]["text"];
							vals += " as "+idata.property["/film/film/starring"]["values"][i]["property"]["/film/performance/character"]["values"][0]["text"];
							if(i<count-1){
								vals += ", ";
							}
						}
						if(vals!=""){
							info += "<span class='info'><b>Starring:</b> "+vals+"</span>";
						}
					}
					
					
					if(idata.property["/architecture/structure/height_meters"]){
						var val = idata.property["/architecture/structure/height_meters"]["values"][0]["text"];
						info += "<span class='info'><b>Height:</b> "+val+" m</span>";
					}
					if(idata.property["/architecture/building/floors"]){
						var val = idata.property["/architecture/building/floors"]["values"][0]["text"];
						info += "<span class='info'><b>Floors:</b> "+val+"</span>";
					}
					if(idata.property["/architecture/structure/architect"]){
						var val = idata.property["/architecture/structure/architect"]["values"][0]["text"];
						info += "<span class='info'><b>Architect:</b> "+val+"</span>";
					}
					if(idata.property["/architecture/structure/engineer"]){
						var vals = "";
						var count = idata.property["/architecture/structure/engineer"]["values"].length;
						for(var i=0;i<count;i++){
							vals += idata.property["/architecture/structure/engineer"]["values"][i]["text"];
							if(i<count-1){
								vals += ", ";
							}
						}
						if(vals!=""){
							info += "<span class='info'><b>Engineer(s):</b> "+vals+"</span>";
						}
					}
					if(idata.property["/architecture/structure/construction_started"]){
						var val = idata.property["/architecture/structure/construction_started"]["values"][0]["text"];
						info += "<span class='info'><b>Construction started:</b> "+val+"</span>";
					}
					if(idata.property["/architecture/structure/opened"]){
						var val = idata.property["/architecture/structure/opened"]["values"][0]["text"];
						info += "<span class='info'><b>Opened:</b> "+val+"</span>";
					}
					
					info += "<div id='info'></div>";
					
					if(idata.property["/location/country/capital"]){
						var val = idata.property["/location/country/capital"]["values"][0]["text"];
						info += "<span class='info'><b>Capital:</b> "+val+"</span>";
					}
					if(idata.property["/location/location/containedby"]){
						var vals = "";
						var count = idata.property["/location/location/containedby"]["values"].length;
						for(var i=0;i<count;i++){
							vals += idata.property["/location/location/containedby"]["values"][i]["text"];
							if(i<count-1){
								vals += ", ";
							}
						}
						if(vals!=""){
							info += "<span class='info'><b>Located in:</b> "+vals+"</span>";
						}
					}
					if(idata.property["/location/country/currency_used"]){
						var val = idata.property["/location/country/currency_used"]["values"][0]["text"];
						info += "<span class='info'><b>Currency:</b> "+val+"</span>";
					}
					if(idata.property["/location/country/national_anthem"]){
						var val = idata.property["/location/country/national_anthem"]["values"][0]["property"]["/government/national_anthem_of_a_country/anthem"]["values"][0]["text"];
						info += "<span class='info'><b>National anthem:</b> "+val+"</span>";
					}
					if(idata.property["/location/country/form_of_government"]){
						var vals = "";
						var count = idata.property["/location/country/form_of_government"]["values"].length;
						for(var i=0;i<count;i++){
							vals += idata.property["/location/country/form_of_government"]["values"][i]["text"];
							if(i<count-1){
								vals += ", ";
							}
						}
						if(vals!=""){
							info += "<span class='info'><b>Form of government:</b> "+vals+"</span>";
						}
					}
					if(idata.property["/location/location/geolocation"]){
						var mlat = idata.property["/location/location/geolocation"]["values"][0]["property"]["/location/geocode/latitude"]["values"][0]["value"];
						var mlon = idata.property["/location/location/geolocation"]["values"][0]["property"]["/location/geocode/longitude"]["values"][0]["value"];
						if(notable=="Country"){
							maptype = "satellite";
							zoom = 4;
						}else if(notable=="City/Town/Village"){
							maptype = "roadmap";
							zoom = 4;
						}else{
							maptype = "satellite";
							zoom = 4;
						}
						point = [mlat, mlon];
						address = name;
						info += "<div id='map'></div>";
					}
					if(idata.property["/travel/travel_destination/tourist_attractions"]){
						var vals = "";
						var count = idata.property["/travel/travel_destination/tourist_attractions"]["values"].length;
						for(var i=0;i<count;i++){
							vals += idata.property["/travel/travel_destination/tourist_attractions"]["values"][i]["text"];
							if(i<count-1){
								vals += ", ";
							}
						}
						if(vals!=""){
							info += "<span class='info'><b>Tourist attractions:</b> "+vals+"</span>";
						}
					}
					
					
					if(idata.property["/common/topic/alias"]){
						var vals = "";
						var count = idata.property["/common/topic/alias"]["values"].length;
						for(var i=0;i<count;i++){
							vals += idata.property["/common/topic/alias"]["values"][i]["text"];
							if(i<count-1){
								vals += ", ";
							}
						}
						if(vals!=""){
							info += "<span class='info'><b>Also known as:</b> "+vals+"</span>";
						}
					}
					info += "<span class='info'>";
					if(idata.property["/common/topic/official_website"]){
						var website = idata.property["/common/topic/official_website"]["values"][0]["text"];
						info += "<a href='"+website+"' target='blank'>Official website</a> - ";
					}
					info += "<a href='"+wikipedia+"' target='blank'>Wikipedia</a></span>";
					
					$("#freebase").html(info);
					
					if(!idata.property["/common/topic/image"]){
						get_thumb(encodeURIComponent(name));
					}
					
					var pinfo = "";
					
					if(is_person){
					$.get("apis/freebase.php?id="+id+"&p=1",function(pdata){
					if(pdata.property["/people/person/date_of_birth"]){
						var birthday = pdata.property["/people/person/date_of_birth"]["values"][0]["text"];
						pinfo += "<span class='info'><b>Was born in:</b> "+birthday+"</span>";
						var is_person = 1;
					}
					if(pdata.property["/people/person/place_of_birth"]){
						var birthplace = pdata.property["/people/person/place_of_birth"]["values"][0]["text"];
						pinfo += "<span class='info'><b>Place of birth:</b> "+birthplace+"</span>";
						var is_person = 1;
					}
					if(pdata.property["/people/deceased_person/date_of_death"]){
						var birthday = pdata.property["/people/deceased_person/date_of_death"]["values"][0]["text"];
						pinfo += "<span class='info'><b>Died in:</b> "+birthday+"</span>";
					}
					if(pdata.property["/people/deceased_person/place_of_death"]){
						var birthplace = pdata.property["/people/deceased_person/place_of_death"]["values"][0]["text"];
						pinfo += "<span class='info'><b>Place of death:</b> "+birthplace+"</span>";
					}
					if(pdata.property["/people/person/religion"]){
						var religion = pdata.property["/people/person/religion"]["values"][0]["text"];
						pinfo += "<span class='info'><b>Religion:</b> "+religion+"</span>";
					}
					if(pdata.property["/people/person/height_meters"]){
						pinfo += "<span class='info'><b>Height:</b> "+pdata.property["/people/person/height_meters"]["values"][0]["text"]+" m</span>";
					}
					if(pdata.property["/people/person/weight_kg"]){
						pinfo += "<span class='info'><b>Weight:</b> "+pdata.property["/people/person/weight_kg"]["values"][0]["text"]+" kg</span>";
					}
					if(pdata.property["/people/person/nationality"]){
						pinfo += "<span class='info'><b>Nationality:</b> "+pdata.property["/people/person/nationality"]["values"][0]["text"]+"</span>";
					}
					if(pdata.property["/people/person/parents"]){
						var parents = "";
						var count = pdata.property["/people/person/parents"]["values"].length;
						for(var i=0;i<count;i++){
							parents += pdata.property["/people/person/parents"]["values"][i]["text"];
							if(i<count-1){
								parents += ", ";
							}
						}
						if(parents!=""){
							pinfo += "<span class='info'><b>Parents:</b> "+parents+"</span>";
						}
					}
					if(pdata.property["/people/marriage/spouse"]){
						pinfo += "<span class='info'><b>Spouse:</b> "+pdata.property["/people/marriage/spouse"]["values"][0]["text"]+"</span>";
					}
					if(pdata.property["/people/person/children"]){
						var children = "";
						var count = pdata.property["/people/person/children"]["values"].length;
						for(var i=0;i<count;i++){
							children += pdata.property["/people/person/children"]["values"][i]["text"];
							if(i<count-1){
								children += ", ";
							}
						}
						if(children!=""){
							pinfo += "<span class='info'><b>Children:</b> "+children+"</span>";
						}
					}
					if(pdata.property["/people/person/profession"]){
						var profs = "";
						var count = pdata.property["/people/person/profession"]["values"].length;
						for(var i=0;i<count;i++){
							profs += pdata.property["/people/person/profession"]["values"][i]["text"];
							if(i<count-1){
								profs += ", ";
							}
						}
						if(profs!=""){
							pinfo += "<span class='info'><b>Profession(s):</b> "+profs+"</span>";
						}
					}
					$("#info").html(pinfo);
					});
					}
					
					if(point!=[0,0]){
						$("#js").load("js/map.html"); //load google map
					}
					
				}
			});
			
		}
	});
}

function replaceAll(find, replace, str){
  return str.replace(new RegExp(find, 'g'), replace);
}

function number_format(x){
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function mround(num, dec){
	var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	return result;
}

function get_duration(duration){
	var dur1 = mround((duration/60), 0);
	if((duration % 60)<10){
		var dur = '0'+(duration % 60);
	}else{
		var dur = duration % 60;
	}
	return dur1+':'+dur;
}

function toTimestamp(strDate){
	var datum = Date.parse(strDate);
	return datum/1000;
}
	
function timeago(time_difference){
	var seconds = time_difference; 
	var minutes = Math.round(time_difference/60);
	var hours = Math.round(time_difference/3600); 
	var days = Math.round(time_difference/86400); 
	var weeks = Math.round(time_difference/604800); 
	var months = Math.round(time_difference/2419200); 
	var years = Math.round(time_difference/29030400); 
		
	if(seconds <= 60){
		return seconds + " seconds ago"; 
	}
	else if(minutes <=60){
		if(minutes==1){
			return "1 minute ago"; 
		}
		else{
			return minutes + " minutes ago"; 
		}
	}
	else if(hours <=24){
		if(hours==1){
			return "1 hour ago";
		}
		else{
			return hours + " hours ago";
		}
	}
	else if(days <=7){
		if(days==1){
			return "1 day ago";
		}
		else{
			return days + " days ago";
		} 
	}
	else if(weeks <=4){
		if(weeks==1){
			return "1 week ago";
		}
		else{
			return weeks + " weeks ago";
		}
	}
	else if(months <=12){
		if(months==1){
			return "1 month ago";
		}
		else{
			return months + " months ago";
		} 
	}
	else{
		if(years==1){
			return "1 year ago";
		}
		else{
			return years + " years ago";
		}
	}
}