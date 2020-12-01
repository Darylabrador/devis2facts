<template>
    <div>
        <v-navigation-drawer v-model="sidebar" app>
            <v-list>
                <v-list-item
                    v-for="item in menuItems"
                    :key="item.title"
                    :to="item.path">
                    <v-list-item-content>{{ item.title }}</v-list-item-content>
                </v-list-item>
                <v-list-item>
                    <v-list-item-content>
                        Déconnnexion
                        <v-btn color="dark" class="nav-item nav-link" text>
                            <v-icon class="mr-1 hidden-sm-and-down">mdi-export</v-icon>
                        </v-btn>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-app-bar app>
        <span class="hidden-sm-and-up">
            <v-app-bar-nav-icon  @click="sidebar = !sidebar"> </v-app-bar-nav-icon>
      </span>
            <v-toolbar-title>
                <router-link to="/" tag="span" style="cursor: pointer">
                    Devis2fact
                </router-link>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-xs-only">
                <v-btn color="error" class="mr-4"
                       v-for="item in menuItems"
                       :key="item.title"
                       :to="item.path"
                       text>
                    {{item.title}}
                </v-btn>

                <v-btn color="dark" class="nav-item nav-link" text>
                    <v-icon class="mr-1 hidden-sm-and-down">mdi-export</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-app-bar>
    </div>
</template>

<script src='./navbar.js' />
