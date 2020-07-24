<!-- Content -->
								<section>
									<header class="main">
										<h1><?php echo($heading) ?></h1>
									</header>

                                    <?php 
                                        foreach($listings as $listing) {
                                            echo("<h2><a href=\"\\main\\listBlogs\\" . $blogPost["slug"] . "\">" . $blogPost["title"] . "</a></h2> @ <time>" . $blogPost["publication_date"] . "</time>");
                                        }
                                    ?>

								</section>

						</div>
					</div>