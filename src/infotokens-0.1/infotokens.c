/* =====================================================================
 * InfoTokens simulates information exchange in a discourse community.
 * =====================================================================
 * Copyright (C) 2010 William Breathitt Gray
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

#include <math.h>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

typedef struct{
	unsigned char alignment;
	float accuracy;
}individual;

typedef struct{
	int size, tokensize;
	unsigned char *tokens;
	float contr, growth, mod, sd, uaccuracy, vand;
	individual *population;
}community;

void conf(community *world);
void newpop(community *world);
void runsim(community *world);
 
int main(){
	//set timer for rand()
	srand((unsigned)time(NULL));
	//create community and ensure there is enough memory
	community *closed = malloc(sizeof(*closed));
	if(closed == NULL){
		printf("ERROR: in main() - couldn't allocate memory for world\n");
		exit(1);
	}
	community *open = malloc(sizeof(*open));
	if(open == NULL){
		printf("ERROR: in main() - couldn't allocate memory for world\n");
		exit(1);
	}
				
	printf(	"+======================================================================+\n"
			"|        InfoTokens Copyright (C) 2010  William Breathitt Gray         |\n"
			"+======================================================================+\n"
			"|  This program comes with ABSOLUTELY NO WARRANTY. This is free        |\n"
			"|  software, and you are welcome to redistribute it under certain      |\n"
			"|  conditions; for further details, please refer to the GNU General    |\n"
			"|  Public License provided with this program.                          |\n"
			"+======================================================================+\n\n");
	
	//start configuration of initial settings
	printf(	"Insert the following probabilities as decimals, the population size as a\n"
			"nonnegative integer, and the rate of growth as a decimal percentage\n"
			"proportional to the population size.\n\n");
			
	// Closed-Content Community
	printf(	"+-----------------------------------------------------------------------+\n"
			"|COMMUNITY 1                                                            |\n"
			"+-----------------------------------------------------------------------+\n");
	conf(closed);
	printf("\n");
	
	// Open-Content Community
	printf(	"+----------------------------------------------------------------------+\n"
			"| COMMUNITY 2                                                          |\n"
			"+----------------------------------------------------------------------+\n");
	conf(open);
	printf("\n");
	
	int gen = 1;
	while(gen < 2){
		runsim(closed);
		runsim(open);
		gen++;
	}
	
	/*int i;
	for(i = 0; i < open->size; i++)
		printf("%f\n", open->population[i].accuracy);*/
	
	//free allocated memory to prevent memory leak
	free(closed);
	free(open);
	return 0;
}

/***********************************************************************
 * Description: configures inital settings of a world
 * Arguments: world - pointer to world structure
 * Returns: nothing
 **********************************************************************/
void conf(community *world){
	char buffer[9];
	
	printf("Probability of contribution: ");
	fgets(buffer, sizeof(buffer), stdin);
	world->contr = atof(buffer);
	
	printf("Rate of growth: ");
	fgets(buffer, sizeof(buffer), stdin);
	world->growth = atof(buffer);
	
	printf("Probability of modification: ");
	fgets(buffer, sizeof(buffer), stdin);
	world->mod = atof(buffer);
	
	printf("Standard deviation of individual accuracy: ");
	fgets(buffer, sizeof(buffer), stdin);
	world->sd = atof(buffer);
	
	printf("Average individual accuracy: ");
	fgets(buffer, sizeof(buffer), stdin);
	world->uaccuracy = atof(buffer);
	
	printf("Probability of vandalism: ");
	fgets(buffer, sizeof(buffer), stdin);
	world->vand = atof(buffer);
	
	printf("Inital population size: ");
	fgets(buffer, sizeof(buffer), stdin);
	world->size = atoi(buffer);
	
	//adjust population size for passive individuals
	int size = 0;
	int mark = 0;
	int lot;
	int i;
	for(i = 0; i < world->size; i++){
		if(world->contr == 1){
			lot = mark;
		}else if(world->contr == 0){
			lot = mark + 1;
		}else{
			lot = rand() % ((int)(100/(100 * world->contr)) - 1);
		}
		if(lot == mark){
			//individual is active
			size++;
		}
	}
	world->size = size;
	//set aside memory for initial population
	world->population = realloc(world->population, (world->size)*sizeof(*world->population));
	if(world->population == NULL){
		printf("ERROR: in conf() - couldn't allocate memory\n");
		exit(1);
	}
	
	//populate world
	newpop(world);
}

/***********************************************************************
 * Description: creates and initializes a new population
 * Arguments: world - pointer to world structure
 * Returns: nothing
 **********************************************************************/
void newpop(community *world){
	//population accuracy
	//adjust this later to not lose precision
	int uaccuracy = (int)(100 * world->uaccuracy);
	int sd = (int)(100 * world->sd);
	if(sd != 0){
		float accuracy;
		for(i = 0; i < world->size; i++){
			accuracy = ((float)((rand() % (2*sd) + (uaccuracy-sd))))/100;
			if(accuracy < 0){
				accuracy = 0;
			}else{
				world->population[i].accuracy = accuracy;
			}
		}
	}else{
		for(i = 0; i < world->size; i++){
			world->population[i].accuracy = 0;
		}
	}
	//population alignment
	int mark = 0;
	int lot;
	int i;
	for(i = 0; i < world->size; i++){
		if(world->vand == 1){
			lot = mark;
		}else if(world->vand == 0){
			lot = mark + 1;
		}else{
			lot = rand() % ((int)(100/(100 * world->vand)) - 1);
		}
		if(lot == mark){
			//individual is malicious
			world->population[i].alignment = 1;
		}else{
			//individual is good
			world->population[i].alignment = 0;
		}
	}
}

/***********************************************************************
 * Description: runs one simulated generation
 * Arguments: world - pointer to first world structure
 * Returns: nothing
 **********************************************************************/
void runsim(community *world){
	int i;
	for(i = 0; i < world->size; i++){
		
	}
}
