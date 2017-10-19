<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Data Design Project</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="https://use.fontawesome.com/46c6e23a21.js"></script>
	</head>
	<body>
		<header>
			<h1>Data Design Project</h1>
				<p>Website: <a href="https://www.reddit.com/" target="_blank">Reddit.com</a></p>
				<p>Link to Post: <a href="https://www.reddit
			.com/r/Albuquerque/comments/75q2kp/hows_verizon_tmobile_celldata_coverage_aibf_field/" target="_blank">Reddit
					Post</a></p>
		</header>
			<main>
				<h2>Phase 0 Assignment: </h2>
					<section>
						<h3>Persona</h3>
							<p><strong>Name:</strong> Malcolm Dubois</p>
							<p><strong>Sex:</strong> Male</p>
							<p><strong>Age:</strong> 33</p>
							<p><strong>Profession:</strong> Verizon Call Center Customer Support</p>
							<p><strong>Technology:</strong> Malcolm is an avid user of technology. He is always purchasing the latest
								model of anything Apple releases. He regularly claims "If my house were burning down and
								I could only grab three things including my family. I would grab my MacBook Pro, his Bongo Drum
								and HTC Vive. </p>
							<p><strong>Hobbies:</strong> When not at the call center, Malcolm is using his MacBook to surf the
								internet or using his HTC Vive to dabble in the world of virtual reality. In addition to his
								passion for technology, he is also in a ska band called HomeGrown with his wife and her two
								brothers.</p>
							<p><strong>Goals:</strong> Malcolm loves Reddit. He uses Reddit for two purposes:</p>
								<ol>
									<li> Browsing his favorite topics to see what people are saying about ska, virtual reality and
										Verizon.</li>
									<li> By starting threads about topics he is looking to get more information he feels like
										this is the perfect way to supplement online research with a real human "voice". As a
										regularly contributing member of Reddit he posts questions and answers questions.</li>
								</ol>
						<p><strong>Knowledge:</strong> Malcolm loves all the things technology and has a deep
							understanding of the IT and gaming world. He doesn't do any kind of coding nor is he planning on it
							.</p>
						<p><strong>Technology Used:</strong> Malcolm is a Apple fanatic. He is currently using a MacBook
							Pro with the latest OS 10.13 "High Sierra" as well the the iPhone 8 Plus and can't wait for the
							iPhone X.</p>
						<h3>User Story</h3>
							<p>As a user, I want to get information about the topics I care about.</p>
					</section>
					<section>
						<h3>Use Case/Interaction Flow</h3>
							<p>Reddit users will interact with our page in this way after a profile is created:</p>
								<ol>
									<li> I will click on the "Ask a question" button</li>
									<li> The site will open to a form with a title section, question detail and post button</li>
									<li> I will complete the form and click the "Post" button</li>
									<li> The site will post my question</li>
									<li> User will then comment on my question</li>
									<li> The site will notify me with an email and link once a user comments</li>
									<li> I will click the link to review the comment</li>
									<li> The site will open up the web browser to my question and the comment</li>
									<li> I will review the comment and if I want to respond I will click the "Respond" button</li>
									<li> The site will open a form with a comment section and a "Post" button</li>
									<li> I will complete the form and click "Post"</li>
									<li> The site will post my comment and notify the other user</li>
								</ol>
					</section>
					<section>
						<h3 class="section">Conceptual Model</h3>
							<h4 class="title">Entities & Attributes</h4>
								<p class="datadesigntitle"><strong>User</strong></p>
									<ul class="datadesignlist">
										<li>UserId (primary)</li>
										<li>userEmail</li>
										<li>userName</li>
										<li>userImage</li>
										<li>userHash</li>
										<li>userSalt</li>
										<li>userActivationToken</li>
									</ul>
								<p class="datadesigntitle"><strong>Post</strong></p>
									<ul class="datadesignlist">
										<li>PostId (primary)</li>
										<li>postUserId (foreign)</li>
										<li>postTitle</li>
										<li>postDetail</li>
										<li>postSubject</li>
										<li>postLocation</li>
										<li>postDateTime</li>
									</ul>
								<p class="datadesigntitle"><strong>Comment</strong></p>
									<ul class="datadesignlist">
										<li>uniqueCommentId (primary)</li>
										<li>commentPostId (foreign)</li>
										<li>commentUserId (foreign)</li>
										<li>commentCommentId (foreign)</li>
										<li>commentDetail</li>
										<li>commentDateTime</li>
										<li>commentPoints</li>
									</ul>
							<h4 class="title">Relations</h4>
								<ul class="datadesignlist">
									<li>One User Can Have Many Posts <strong>(1 to n)</strong></li>
									<li>One User Can Have Many Comments <strong>(1 to n)</strong></li>
									<li>One Post Can Have Many Comments <strong>(1 to n)</strong></li>
									<li>One Comment Can Have Many Comments <strong>(1 to n)</strong></li>
								</ul>
					</section>
		</main>
		<footer>
			<p>Project Completed By Zach Spangler</p>
			<a href="https://github.com/zachspangler" target="_blank"><i class="fa fa-github fa-3x" aria-hidden="true"></i></a>
			<a href="https://www.linkedin.com/in/zachary-spangler-66b1a019/" target="_blank"><i class="fa fa-linkedin fa-3x"
																										aria-hidden="true"></i></a>
		</footer>
	</body>
</html>