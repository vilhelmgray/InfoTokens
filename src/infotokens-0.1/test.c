/*#include <stdio.h>
#include <stdlib.h>

int main ()
{
  int input,n;
  int count=0;
  
  typedef struct{
	  int *numbers;
  }cheese;
  cheese *pie = malloc(sizeof(*pie));
  do {
     printf ("Enter an integer value (0 to end): ");
     scanf ("%d", &input);
     count++;
     pie->numbers = realloc (pie->numbers, count * sizeof(*pie->numbers));
	 if (pie->numbers==NULL)
       { puts ("Error (re)allocating memory"); exit (1); }
     pie->numbers[count-1]=input;
  } while (input!=0);

  printf ("Numbers entered: ");
  for (n=0;n<count;n++) printf ("%d ",pie->numbers[n]);
  free (pie);

  return 0;
}*/
#include <math.h>
  #include <stdio.h>

  int main(void)
  {
    int a = 34;
    
    int b = rand() % 0;
    printf("%d\n", b);

    return 0;
  }
