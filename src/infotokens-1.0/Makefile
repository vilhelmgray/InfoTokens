CC = gcc
CFLAGS = -O3 -std=c99 -Wall -Wextra -pedantic
LIBS = -lm
OBJECTS = infotokens.o
TARGET = infotokens
RM = rm

$(TARGET) : $(OBJECTS)
	$(CC) $(CFLAGS) $(LIBS) $(OBJECTS) -o $(TARGET)

infotokens.o :

.PHONY : clean
clean :
	$(RM) $(OBJECTS) $(TARGET)
