<template id="single-location-menu">
	<div v-if="post" class="post-list-wrap">
		
		<div class="single-post" >
			
			
		 	<div class="location-banner" :style="{ 'background-image' : 'url(' + post.acf.location_banner_image.url + ')' }" >
			 	<div class="change-location">
				 	<router-link v-on:click.native="scrollTop" to="/rubicon-vue/locations">Change Locations</router-link>
			 	</div>
			 	<div class="inner-wrap">
				 	
					<div class="location-name">
						{{post.acf.location_name}}
						<div class="red">MENU</div>
<!-- 						<div v-else-if="post.acf.menu_page_id" class="red">CATERING</div> -->
					</div><!-- location-name -->
					<div class="print-pdf">
						<a :href="post.acf.menu_file" target="_blank">PRINT/View MENU PDF <span>+</span></a>
					</div><!-- print-pdf -->
					<div class="link-wrap">
						<router-link :to="{name: 'locationSingle', params: {postName: post.acf.location_page_id.post_name, locationPageID: post.acf.location_page_id.ID}}">View Location Info</router-link>
						
<!-- 						<router-link v-if="post.acf.catering_page_id" :to="{name: 'cateringMenu', params: {postName: post.acf.catering_page_id.post_name, postName: post.acf.catering_page_id.post_name, cateringPageID: post.acf.catering_page_id.ID}}">Order Catering</router-link> -->
						<router-link  :to="{name: 'cateringMenu', params: {postName: post.acf.catering_page_id.post_name, postName: post.acf.catering_page_id.post_name, cateringPageID: post.acf.catering_page_id.ID}}">Order Catering</router-link>
						
						<router-link v-if="post.acf.menu_page_id" :to="{name: 'locationMenu2', params: {parentName: post.acf.menu_page_id[0].post_name, postName: post.acf.menu_page_id[1].post_name, menuPageID: post.acf.menu_page_id[1].ID}}">View Menu {{post.acf.menu_page_id.ID}}</router-link>
					</div><!-- link-wrap -->

				</div><!-- inner-wrap -->
		 	</div><!-- location-banner -->
			
			<div class="menu-container">
				<div id="menu-navigation-wrap" class="menu-navigation-wrap">
					<button v-if="post.acf.sandwiches_show_or_hide == 'show'" v-on:click="scrollMenu();toggleVisibility('sandwich-wrap');"><span>Sandwiches</span> +</button>
					<button v-if="post.acf.salads_show_or_hide == 'show'" v-on:click="scrollMenu();toggleVisibility('salads-wrap');"><span>Best Dressed Salads</span> +</button>
					<button v-if="post.acf.soups_show_or_hide == 'show'" v-on:click="scrollMenu();toggleVisibility('soups-wrap');"><span>Soups</span> +</button>
					<button v-if="post.acf.whippersnappers_show_or_hide == 'show'" v-on:click="scrollMenu();toggleVisibility('whipper-snappers-wrap');"><span>Whipper snappers</span> +</button>
					<button v-if="post.acf.brews_show_or_hide == 'show'" v-on:click="scrollMenu();toggleVisibility('brews-wrap');"><span>Brews</span> +</button>
					<button v-if="post.acf.drinks_show_or_hide == 'show'" v-on:click="scrollMenu();toggleVisibility('drinks-wrap');"><span>Drinks</span> +</button>
					<button v-if="post.acf.sides_show_or_hide == 'show'" v-on:click="scrollMenu();toggleVisibility('sides-wrap');"><span>Sides</span> +</button>
					<button v-if="post.acf.sweets_show_or_hide == 'show'" v-on:click="scrollMenu();toggleVisibility('sweet-tooth-wrap');"><span>Sweet Tooth</span> +</button>
					<!-- <button v-on:click="toggleVisibility('dapper-deals-wrap');scrollMenu()"><span>Dapper Deals</span> +</button> -->
				</div><!-- menu-navigation-wrap -->
				<div class="menu-scroll-anchor"></div>
				<div id="sandwich-wrap" class="menu-section" v-if="post.acf.sandwiches_show_or_hide == 'show'">
					<div class="box">
						<h3 class="menu-type-title">Sandwiches</h3>
						<p>{{post.acf.sandwiches_menu_builder[0].description}}</p>
						<div class="menu-style-grid">
							<div class="box" v-html="post.acf.sandwiches_menu_builder[0].col1"></div><!-- col1 -->
							<div class="box" v-html="post.acf.sandwiches_menu_builder[0].col2"></div><!-- col2 -->
							<div class="box" v-html="post.acf.sandwiches_menu_builder[0].col3"></div><!-- col3 -->
						</div>
					</div><!-- box -->
					<div class="box" v-for="section in post.acf.sandwiches_menu_builder[0].menu">
						<h4 class="section-title">{{section.section_title}}</h4>
						<div class="flex-wrap" v-for="field in section.menu_section">
							<div class="item-name">{{field.item_name}}</div>
							<div class="item-description" v-html="field.item_description"></div>
							<div class="item-price">{{field.price}}</div>
						</div><!-- flex-wrap -->
					</div><!-- box -->
				</div><!-- sandwich-wrap -->
				
				
				<div id="salads-wrap" class="menu-section" style="display: none;">
					<div class="box" v-for="section in post.acf.salads_menu_builder[0].menu">
						<h3 class="menu-type-title">{{section.section_title}}</h3>
						<div class="flex-wrap" v-for="field in section.menu_section">
							<div class="item-name">{{field.item_name}}</div>
							<div class="item-description" v-html="field.item_description"></div>
							<div class="item-price">{{field.price}}</div>
						</div><!-- flex-wrap -->
					</div><!-- box -->
				</div><!-- salads-wrap -->
				
				<div id="soups-wrap" class="menu-section" style="display: none;">
					<div class="box" v-for="section in post.acf.soups_menu_builder[0].menu">
						<h3 class="menu-type-title">Scratch Soups</h3>
						<div class="flex-wrap" v-for="field in section.menu_section">
							<div class="item-name">{{field.item_name}}</div>
							<div class="item-description" v-html="field.item_description"></div>
							<div class="item-price">{{field.price}}</div>
						</div><!-- flex-wrap -->
					</div><!-- box -->
				</div><!-- soups-wrap -->
				
				<div id="whipper-snappers-wrap" class="menu-section" style="display: none;">
					<div class="box" v-if="post.acf.whipper_snapper_menu_builder[0].col1">
						<h3 class="menu-type-title">Whipper Snappers</h3>
						<p>{{post.acf.whipper_snapper_menu_builder[0].description}}</p>
						<div class="menu-style-grid">
							<div class="box col1" v-html="post.acf.whipper_snapper_menu_builder[0].col1"></div><!-- col1 -->
						</div>
					</div><!-- box -->
					<div class="box" v-for="section in post.acf.whipper_snapper_menu_builder[0].menu">
						<h3 class="menu-type-title">Whipper Snappers</h3>
						<div class="flex-wrap mini" v-for="field in section.menu_section">
<!-- 							<div class="item-name">{{field.item_name}}</div> -->
							<div class="item-description" v-html="field.item_description"></div>
							<div class="item-price">{{field.price}}</div>
						</div><!-- flex-wrap -->
					</div><!-- box -->
				</div><!-- whipper-snappers-wrap -->
				
				<div id="brews-wrap" class="menu-section" style="display: none;">
					<div class="box">
						<h3 class="menu-type-title">Brews</h3>
						<p>{{post.acf.brews_menu_builder[0].description}}</p>
						<div class="menu-style-grid ">
							<div class="box col1" v-html="post.acf.brews_menu_builder[0].col1"></div><!-- col1 -->
						</div>
					</div><!-- box -->
					
				</div><!-- brews-wrap -->
				
				<div id="drinks-wrap" class="menu-section" style="display: none;">
					<div class="box"  v-if="post.acf.drinks_menu_builder[0].col1">
						<h3 class="menu-type-title">Drinks</h3>
						<p>{{post.acf.drinks_menu_builder[0].description}}</p>
						<div class="menu-style-grid ">
							<div class="box col1" v-html="post.acf.drinks_menu_builder[0].col1"></div><!-- col1 -->
						</div>
					</div><!-- box -->
					<div class="box" v-if="post.acf.drinks_menu_builder[0].menu" v-for="section in post.acf.drinks_menu_builder[0].menu">
						<h3 class="menu-type-title">Drinks</h3>
						<div class="flex-wrap mini" v-for="field in section.menu_section">
<!-- 							<div class="item-name">{{field.item_name}}</div> -->
							<div class="item-description" v-html="field.item_description"></div>
							<div class="item-price">{{field.price}}</div>
						</div><!-- flex-wrap -->
					</div><!-- box -->
				</div><!-- sandwich-wrap -->
				
				<div id="sides-wrap" class="menu-section" style="display: none;">
					<div class="box" v-if="post.acf.sides_menu_builder[0].col1">
						<h3 class="menu-type-title">Sides</h3>
						<p>{{post.acf.sides_menu_builder[0].description}}</p>
						<div class="menu-style-grid ">
							<div class="box col1" v-html="post.acf.sides_menu_builder[0].col1"></div>
						</div>
					</div><!-- box -->
					<div class="box" v-for="section in post.acf.sides_menu_builder[0].menu">
						<h3 class="menu-type-title">Sides</h3>
						<div class="flex-wrap mini" v-for="field in section.menu_section">
<!-- 							<div class="item-name">{{field.item_name}}</div> -->
							<div class="item-description" v-html="field.item_description"></div>
							<div class="item-price">{{field.price}}</div>
						</div><!-- flex-wrap -->
					</div><!-- box -->
				</div><!-- sides-wrap -->
				
				<div id="sweet-tooth-wrap" class="menu-section" style="display: none;">
					<div class="box" v-if="post.acf.sweettooth_menu_builder[0].col1">
						<h3 class="menu-type-title">Sweet Tooth</h3>
						<p>{{post.acf.sides_menu_builder[0].description}}</p>
						<div class="menu-style-grid ">
							<div class="box col1" v-html="post.acf.sweettooth_menu_builder[0].col1"></div>
						</div>
					</div><!-- box -->
					<div class="box" v-for="section in post.acf.sweettooth_menu_builder[0].menu">
						<h3 class="menu-type-title">Sweet Tooth</h3>
						<div class="flex-wrap mini" v-for="field in section.menu_section">
<!-- 							<div class="item-name">{{field.item_name}}</div> -->
							<div class="item-description" v-html="field.item_description"></div>
							<div class="item-price">{{field.price}}</div>
						</div><!-- flex-wrap -->
					</div><!-- box -->
				</div><!-- sandwich-wrap -->
<!--
				<div id="dapper-deals-wrap" class="menu-section" style="display: none;">
					<div class="box" v-for="section in post.acf.dapperdeals_menu_builder[0].menu">
						<h3 class="menu-type-title">Dapper Deals</h3>
						<div class="flex-wrap mini" v-for="field in section.menu_section">
							<div class="item-description" v-html="field.item_description"></div>
							<div class="item-price">{{field.price}}</div>
						</div>
					</div>
				</div>
-->
				
				
				
				
			</div><!-- menu-container -->
			
			<div class="repeater-item" v-for="field in post.acf.repeater">
				{{field.text}}<br>
				<img :src="field.image.sizes.thumbnail"/>
			</div><!-- repeater-item -->

		 	
		</div><!-- single-post -->
		
		<div class="loader" style="display: none;">
			<img src="<?php bloginfo('template_url') ?>/three-dots.svg" />
		</div>
	</div><!-- post-list-wrap -->
</template>