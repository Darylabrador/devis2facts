<template>
	<div>
		<v-navigation-drawer v-model="sidebar" app>
			<v-list>
				<v-list-item
					v-for="item in menuItems"
					:key="item.title"
					:to="item.path"
				>
					<v-list-item-content>{{ item.title }}</v-list-item-content>
				</v-list-item>
				<v-list-item>
					<v-list-item-content>
						Déconnnexion
						<v-btn
							color="dark"
							v-if="isChecked"
							@click="logout"
							class="nav-item nav-link"
							text
						>
							<v-icon class="mr-1 hidden-sm-and-down">mdi-export</v-icon>
						</v-btn>
					</v-list-item-content>
				</v-list-item>
			</v-list>
		</v-navigation-drawer>
		<v-app-bar app class="bg-yellow">
			<span class="hidden-sm-and-up">
				<v-app-bar-nav-icon @click="sidebar = !sidebar"> </v-app-bar-nav-icon>
			</span>
			<v-toolbar-title>
				<router-link
					to="/"
					tag="span"
					style="cursor: pointer"
					class="font-weight-bold"
				>
					Devis2fact
				</router-link>
			</v-toolbar-title>
			<v-spacer></v-spacer>
			<v-toolbar-items class="hidden-xs-only">
				<v-btn
					color="black"
					class="mr-4 color-black"
					v-for="item in menuItems"
					:key="item.title"
					:to="item.path"
					text
				>
					{{ item.title }}
				</v-btn>
				<v-bottom-sheet v-model="sheet" inset>
					<template v-slot:activator="{ on, attrs }">
						<v-btn
							color="dark"
							class="nav-item nav-link"
							text
								v-if="isChecked"
							v-bind="attrs"
							v-on="on"
						>
							<v-icon class="mr-1 hidden-sm-and-down">mdi-export</v-icon>
						</v-btn>
					</template>
					<v-sheet class="text-center" height="200px">
						<v-btn
							@click="logout"
							class="mt-6"
							text
							color="success"
						>
							Oui
						</v-btn>
						<v-btn class="mt-6" text color="error" @click="sheet = !sheet">
							Non
						</v-btn>
						<div class="my-3"> Êtes vous sûr de vouloir vous deconnecter ? </div>
					</v-sheet>
				</v-bottom-sheet>
			</v-toolbar-items>
		</v-app-bar>
	</div>
</template>
<style>
.bg-yellow {
	background-color: #ff9900 !important;
}
.color-black {
	color: #424242 !important;
}
</style>
<script src='./navbar.js' />
