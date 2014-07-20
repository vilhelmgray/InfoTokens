/*======================================================================
 *                              InfoTokens
 *======================================================================
 * Simulates an open-content discourse community (e.g. a wiki).
 *----------------------------------------------------------------------
 * Author:      William Breathitt Gray
 * Date:        November 20, 2012
 * Version:     1.0
 * Copyright:   Simplified BSD License
 * 
 * Language:    C
 * Standard:    C99
 *----------------------------------------------------------------------
 * Copyright (c) 2012, William Breathitt Gray
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in
 *    the documentation and/or other materials provided with the
 *    distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS
 * OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY
 * WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *======================================================================
 *======================================================================
 */
#include <ctype.h>
#include <errno.h>
#include <math.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(void){
    /****************
     * CONFIGURATION 
     ****************/
    char buffer[256];
    char *check;

    FILE *fout = NULL;
    printf("Print data to a file (0 to exit) [y/N]: ");
    fgets(buffer, sizeof(buffer), stdin);
    if(buffer[0] == '0'){
        exit(0);
    }else if(buffer[0] == 'Y' || buffer[0] == 'y'){
        do{
            printf("Input filepath (0 to cancel): ");
            fgets(buffer, sizeof(buffer), stdin);
            if(buffer[0] == '0' && isspace(buffer[1])){
                break;
            }
            
            // trim whitespace
            size_t t;
            for(t = 0; t < sizeof(buffer); t++){
                // find end of string
                if(buffer[t] == 0){
                    // going to search from end now
                    t--;
                    break;
                }
            }
            do{
                // find end of filepath
                if(!isspace(buffer[t])){
                    // set end of string
                    buffer[++t] = 0;
                    break;
                }
                // go to next character from end
                t--;
            }while(t != 0);
            
            fout = fopen(buffer, "w");
            if(fout){
                break;
            }
        }while(fprintf(stderr, "***** UNABLE TO CREATE FILE *****\n"
                               ">>>>> %s\n\n", strerror(errno)));
    }

    const unsigned long MAX_POPULATION = (-1);
    unsigned long population;
    do{
        printf("Population Size (0 to exit) [1 - %lu]: ", MAX_POPULATION);
        fgets(buffer, sizeof(buffer), stdin);
        population = strtoul(buffer, &check, 0);

        if(check != buffer){
            if(!population){
                exit(0);
            }
            if(population <= MAX_POPULATION){
                break;
            }
        }
    }while(fprintf(stderr, "***** INVALID INPUT *****\n\n"));

    double contrib_percent;
    do{
        printf("Contribution Percentage (less than 0 to exit) [0.0 - 1.0]: ");
        fgets(buffer, sizeof(buffer), stdin);
        contrib_percent = strtod(buffer, &check);

        if(check != buffer){
            if(contrib_percent < 0.0){
                exit(0);
            }
            if(contrib_percent <= 1.0){
                break;
            }
        }
    }while(fprintf(stderr, "***** INVALID INPUT *****\n\n"));

    double add_percent;
    do{
        printf("Addition Percentage (less than 0 to exit) [0.0 - 1.0]: ");
        fgets(buffer, sizeof(buffer), stdin);
        add_percent = strtod(buffer, &check);

        if(check != buffer){
            if(add_percent < 0.0){
                exit(0);
            }
            if(add_percent <= 1.0){
                break;
            }
        }
    }while(fprintf(stderr, "***** INVALID INPUT *****\n\n"));

    double mod_percent;
    do{
        printf("Modification Percentage (less than 0 to exit) [0.0 - 1.0]: ");
        fgets(buffer, sizeof(buffer), stdin);
        mod_percent = strtod(buffer, &check);

        if(check != buffer){
            if(mod_percent < 0.0){
                exit(0);
            }
            if(mod_percent <= 1.0){
                break;
            }
        }
    }while(fprintf(stderr, "***** INVALID INPUT *****\n\n"));

    double vand_percent;
    do{
        printf("Vandalism Percentage (less than 0 to exit) [0.0 - 1.0]: ");
        fgets(buffer, sizeof(buffer), stdin);
        vand_percent = strtod(buffer, &check);

        if(check != buffer){
            if(vand_percent < 0.0){
                exit(0);
            }
            if(vand_percent <= 1.0){
                break;
            }
        }
    }while(fprintf(stderr, "***** INVALID INPUT *****\n\n"));

    double accuracy;
    do{
        printf("Accuracy (less than 0 to exit) [0.0 - 1.0]: ");
        fgets(buffer, sizeof(buffer), stdin);
        accuracy = strtod(buffer, &check);

        if(check != buffer){
            if(accuracy < 0.0){
                exit(0);
            }
            if(accuracy <= 1.0){
                break;
            }
        }
    }while(fprintf(stderr, "***** INVALID INPUT *****\n\n"));

    // ensure overflow does not occur
    // ** Let x = generation >= 1, y = population size <= ULONG_MAX
    // ** y = population_seed*(growth_rate)^x
    // ** growth_rate = pow(y/population_seed, 1/x)
    // **             <= ULONG_MAX/population_seed, {y=ULONG_MAX, x=1}
    double MAX_GROWTH_RATE = (double)((unsigned long)(-1))/population;
    double growth_rate;
    do{
        printf("Population Growth Rate (0 or less to exit) [0 - %e]: ", MAX_GROWTH_RATE);
        fgets(buffer, sizeof(buffer), stdin);
        growth_rate = strtod(buffer, &check);

        if(check != buffer){
            if(growth_rate <= 0.0){
                exit(0);
            }
            if(growth_rate <= MAX_GROWTH_RATE){
                break;
            }
        }
    }while(fprintf(stderr, "***** INVALID INPUT *****\n\n"));

    unsigned long MAX_GENERATIONS = (unsigned long)(-1);
    // if population will grow
    if(growth_rate > 1.0){
        // ensure overflow does not occur
        // ** Let x = generation >= 1, y = population size <= ULONG_MAX
        // ** y = population_seed*(growth_rate)^x
        // ** x <= log(ULONG_MAX/population_seed)/log(growth_rate);
        MAX_GENERATIONS = log((double)((unsigned long)(-1))/population)/log(growth_rate) + 1.0;
    }else if(growth_rate < 1.0){
        // end simulation when no one is left in the population
        // ** Let x = last generation, y = population size = 1
        // ** y = population_seed*(growth_rate)^x
        // ** x = log(1.0/population_seed)/log(growth_rate);
        MAX_GENERATIONS = log(1.0/population)/log(growth_rate) + 1.0;
    }
    
    unsigned long num_generations;
    do{
        printf("Number of Generations (0 to exit) [0 - %lu]: ", MAX_GENERATIONS);
        fgets(buffer, sizeof(buffer), stdin);
        num_generations = strtoul(buffer, &check, 0);

        if(check != buffer){
            if(!num_generations){
                exit(0);
            }
            if(num_generations <= MAX_GENERATIONS){
                break;
            }
        }
    }while(fprintf(stderr, "***** INVALID INPUT *****\n\n"));

    /*************
     * SIMULATION 
     *************/
    unsigned long true = 0, false = 0;
    // initialize population trend
    double pop_trend = population;
    
    unsigned long i;
    for(i = 0; i < num_generations; i++){
        // new population size
        population = pop_trend;
        // persons who have the potential to contribute
        double active = pop_trend*contrib_percent;

        // number of additions
        double adds = active*add_percent;

        // increase tokens while accounting for vandalism
        unsigned long vand_adds = adds*vand_percent;
        // vandalism
        if(false+vand_adds < false){
            // overflow occurs
            fprintf(stderr, ">>>>> False tokens overflow occurs in Generation #%lu.\n", i);
            fprintf(stderr, ">>>>> WARNING: Summary data may be incorrect due to overflow.\n"
                            "               File output valid through Generation #%lu.\n\n", i);
            break;
        }
        false += vand_adds;
        adds -= vand_adds;
        // true tokens
        unsigned long true_adds = adds*accuracy;
        if(true+true_adds < true){
            // overflow occurs
            fprintf(stderr, ">>>>> True tokens overflow occurs in Generation #%lu.\n", i);
            fprintf(stderr, ">>>>> WARNING: Summary data may be incorrect due to overflow.\n"
                            "               File output valid through Generation #%lu.\n\n", i);
            break;
        }
        true += true_adds;
        adds -= true_adds;
        // false tokens
        if(false+adds < false){
            // overflow occurs
            fprintf(stderr, ">>>>> False tokens overflow occurs in Generation #%lu.\n", i);
            fprintf(stderr, ">>>>> WARNING: Summary data may be incorrect due to overflow.\n"
                            "               File output valid through Generation #%lu.\n\n", i);
            break;
        }
        false += adds;

        // only makes sense to delete if there are tokens to delete
        if(true+false > 0){
            // number of deletions
            double deletes = active*mod_percent;

            // decrease tokens while accounting for vandalism
            double vand_deletes = deletes*vand_percent;
            // vandalism (vandals delete tokens at random)
            if(vand_deletes > (double)true+false){
                true = 0;
                false = 0;
            }else{
                unsigned long true_deletes = (vand_deletes*true)/((double)true+false);
                true -= true_deletes;
                false -= (unsigned long)(vand_deletes - true_deletes);
            }
            deletes -= vand_deletes;
            
            if(true+false > 0){
                // false tokens
                unsigned long false_deletes = (deletes*accuracy*false)/((double)true+false);
                if(false_deletes > false){
                    false_deletes = false;
                }
                false -= false_deletes;
                deletes -= false_deletes;

                if(true > 0){
                    // true tokens
                    deletes *= ((1.0-accuracy)*true)/((double)true+false);
                    if(deletes > true){
                        deletes = true;
                    }
                    true -= (unsigned long)deletes;
                }
            }
        }

        if(fout){
            // print data to file
            fprintf(fout, "%lu %lu %lu %lf %lu\n", i, true, false, (true+false > 0) ? true/((double)true+false) : 0.0, population);
        }

        // grow population trend
        pop_trend *= growth_rate;
    }

    /**********
     * RESULTS 
     **********/
    printf("True: %lu\nFalse: %lu\nAccuracy: %lf\nPopulation: %lu\n", true, false, (true+false > 0) ? true/((double)true+false) : 0.0, population);
    
    return 0;
}
