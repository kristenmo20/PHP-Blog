<!-- Content -->
								<section>
									<header class="main">
										<h1><?php echo($heading) ?></h1>
									</header>
                                    
                                        <?php 
                                            foreach($posts as $post) {
                                                echo("<h2><a href=\"\\blog\\readBlog\\" . $post["slug"] . "\">" . $post["title"] . "</a></h2> @ <time>" . $post["publication_date"] . "</time>");
                                            }
                                            
                                        ?>
                                    

								</section>

						</div>
					</div>